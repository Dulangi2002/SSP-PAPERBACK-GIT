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


        <h1 class="text-xl font-semibold mt-4 mb-4 text-center">Edit user information</h1>






        <form method="POST" action="{{ route('updateuser') }}">
        @csrf


         <div class="flex flex-row">
         <button type="submit" class= "mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out" >Update</button><br>
       
         <button type="submit" class= "mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out" >   <a href="{{url('user-list')}}"> Back </a></button><br>
         </div>

       


        <input type="hidden" name="id" value="{{$data->id}}">
        
  

    <div class="space-y-12 mx-6">
    <div class="border-b border-gray-900/10 pb-12">

        <div class="mb-6" >
        <label  class="text-sm  font-semibold text-gray-600 dark:text-gray-400"> name</label>
        <div class="mt-2">
        <input class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300
                 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600
                  dark:focus:ring-gray-900 dark:focus:border-gray-500" type="text" name="name" value="{{$data->name}}">
        <div> @error('name'){{$message}}@enderror</div>
        </div>
        </div>
      




      
        <div class="mb-6" >
        <label class="text-sm  font-semibold text-gray-600 dark:text-gray-400">email</label>
        <div class="mt-2">
        <input class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300
                 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" type="email" name="email" value="{{$data->email}}">
        <div> @error('email'){{$message}}@enderror</div>
        </div>
        </div>

        <div class="mb-6" >
        <label class="text-sm  font-semibold text-gray-600 dark:text-gray-400">Contact Number</label>
        <div class="mt-2">
        <input class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300
                 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 
                 dark:focus:border-gray-500" type="number" name="ContactNumber" value="{{$userAddressData->ContactNumber}}">
        <div> @error('ContactNumber'){{$message}}@enderror</div>
        </div>
        </div>

        <div class="mb-6" >
        <label class="text-sm  font-semibold text-gray-600
         dark:text-gray-400">House Number</label>
        <div class="mt-2">
        <input class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300
                 dark:bg-gray-700 dark:text-white 
                 dark:placeholder-gray-500 dark:border-gray-600
                  dark:focus:ring-gray-900 
                 dark:focus:border-gray-500" type="number"
                  name="houseNumber" value="{{$userAddressData->houseNumber}}">
        <div> @error('houseNumber'){{$message}}@enderror</div>
        </div>
        </div>


        <div class="mb-6" >
        <label class="text-sm  font-semibold text-gray-600
         dark:text-gray-400">Street Adress</label>
        <div class="mt-2">
        <input class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300
                 dark:bg-gray-700 dark:text-white 
                 dark:placeholder-gray-500 dark:border-gray-600
                  dark:focus:ring-gray-900 
                 dark:focus:border-gray-500" type="text"
                  name="streetAddress" value="{{$userAddressData->streetAddress}}">
        <div> @error('streetAddress'){{$message}}@enderror</div>
        </div>
        </div>

        <div class="mb-6" >
        <label class="text-sm  font-semibold text-gray-600
         dark:text-gray-400">City</label>
        <div class="mt-2">
        <input class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300
                 dark:bg-gray-700 dark:text-white 
                 dark:placeholder-gray-500 dark:border-gray-600
                  dark:focus:ring-gray-900 
                 dark:focus:border-gray-500" type="text"
                  name="city" value="{{$userAddressData->city}}">
        <div> @error('city'){{$message}}@enderror</div>
        </div>
        </div>




        

      </div>
    </div>


</form>
</div>
</div>
</body>
    

