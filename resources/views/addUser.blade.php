@extends('layouts.adminheader')


<header>

@livewire('admin-desktop-menu')

</header>

  <body>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">


        @if(Session::has('success'))
        <div>
        {{Session::get('success')}} 
        </div>
        @endif    



        <h1 class="text-xl font-semibold mt-4 mb-4 text-center">Add user</h1>  

        <form method="POST" action="{{url('save-customer')}}">
        @csrf


        
<div class="flex flex-row"> 
        <button type="submit" class= "mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out">Submit</button><br>
        <button class= "mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out"><a href="{{url('customer-list')}}">back</a></button>
</div>


        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        First Name
        </label>
        <input class=" w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3   "  type="text" name="firstname" value="{{old('firstname')}}">
        @error('firstname')
        <div>
        {{$message}}
        @enderror
        </div>
        </div>


        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        Last Name
        </label>
        <input class=" w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3   "  type="text" name="lastname" value="{{old('lastname')}}">
        @error('lastname')
        <div>
        {{$message}}
        </div>
        @enderror
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        Email address
        </label>
        <input class=" w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3"  type="email" name="email"value="{{old('email')}}" >
        @error('email')
        <div>
        {{$message}}
        </div>
        @enderror
        </div>



        
        <div class="mb-6" >
                <x-label for="password" value="{{ __('Password') }}" class="text-sm text-gray-600 dark:text-gray-400"/>
                <div class="mt-2">
                <x-input id="password" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" type="password" name="password" required autocomplete="new-password" />
            </div>  </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm text-gray-600 dark:text-gray-400"/>     
                <div class="mt-2">
                <x-input id="password_confirmation" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>  </div>




</form>
</div>
</div>
</body>


