
<!DOCTYPE html>
    <html>
        <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body x-data="{openMenu : false , isModalOpen: false  , sessionSuccessful: false}" x-on:keydown.escape="isModalOpen=false">
            <header class=" flex justify-between bg-white drop-shadow-sm py-4 px-8 ">
                <button class="md:hidden" @click="openMenu = !openMenu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
</svg>
</button>


 
<!-- dsktop mneu-->
<nav class="hidden  md:flex ">
    <ul class="flex flex-row gap-3">
        <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded">
            <a href="{{url('getadmindashboard')}}">Dashboard</a>
         </li>   
         <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded"> 
            <a href="{{url('admin-list')}}">Manage Admin</a>
            </li>
           
            <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded">    
            <a href="{{url('user-list')}}">Manage Users</a>
            </li>
            <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded">
            <a href="{{url('product-list')}}">Products</a>
            </li>
            <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded">
            <a href="{{ route('profile.show') }}">   {{ __('Profile') }}</a>
            </li>
            <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded">
            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <a href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}</a>
            </form>
        
        </li>


</nav>
       
 </header>


 <!--pop out nav-->
 <nav class="fixed top-0 right-0 bottom-0 left-0 backdrop-blur-sm z-10"  :hidden="!openMenu">


    <ul class="absolute top-0 bottom-0 left-0  w-10/12 py-4 bg-white drop-shadow-2xl z-10">
    <li class="border-b border-inherit "><a href="{{url('getadmindashboard')}}" class="block p-4 hover:bg-indigo-300 rounded">Dashboard</a></li>

    <li class="border-b border-inherit "><a href="{{url('admin-list')}}" class="block p-4 hover:bg-indigo-300 rounded">Admin</a></li>
    <li class="border-b border-inherit "><a href="{{url('user-list')}}" class="block p-4 hover:bg-indigo-300 rounded">User</a></li>
    <li class="border-b border-inherit "><a href="{{url('product-list')}}" class="block p-4 hover:bg-indigo-300 rounded" >Products</a></li>
    <li class="border-b border-inherit "><a href="{{ route('profile.show') }}" class="block p-4 hover:bg-indigo-300 rounded">   {{ __('Profile') }}</a></li>
    <li class="border-b border-inherit ">  <form class="block p-4 hover:bg-indigo-300 rounded" method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <a href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}</a>
            </form></li>

</ul>





<!---close button-->

<button class="absolute top-0 right-0 bottom-0 left-0" @click="openMenu = !openMenu">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-2 right-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>

</button>

</nav>



@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

 
      
<h1 class="text-xl font-semibold mt-4 mb-4 text-center">Create User</h1>


<form method="POST" action="{{url('save-user')}} ">
  @csrf

  <div class="flex flex-row">

  
        <button class= "mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out"type="submit">Save user</button>

        <a href="{{url('user-list')}}" class= "mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out" >Back</a>
  </div>











  <div class="space-y-12 mx-6">
    <div class="border-b border-gray-900/10 pb-12">

    <div class="mb-6" >
          <label for="name" class="text-sm  font-semibold text-gray-600 dark:text-gray-400">Name</label>
          <div class="mt-2">
              <input   class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300
                 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"  type="text" name="name" value="{{old('name')}}">
               <div>@error('name'){{$message}}@enderror</div>

            </div>
          </div>
     

      <div class="mb-6" >
          <label for="email" class="text-sm  font-semibold text-gray-600 dark:text-gray-400">Email</label>
          <div class="mt-2">
            <input class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300
                 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"  type="email" name="email" value="{{old('email')}}">
          <div>@error('email'){{$message}}@enderror</div> 
          </div>
        </div>


        <div class="mb-6" >
                <x-label for="password" value="{{ __('Password') }}" class="text-sm text-gray-600 dark:text-gray-400"/>
                <div class="mt-2">
                <x-input id="password" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300
                 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"
                  type="password" name="password" required autocomplete="new-password" />
                  <div>@error('password'){{$message}}@enderror</div> 

            </div>
        </div>

     

      </div>
    </div>

  


</form>
</body>
</html>
