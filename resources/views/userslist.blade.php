
<!DOCTYPE html>
    <html>
        <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body x-data="{openMenu : false}">
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





<h1 class="text-xl font-semibold mt-4 mb-4 text-center">Users List</h1>



<div class="h-5" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
@if(Session()->has('success'))
  <div class="bg-green-300 px-2 py-3 rounded-md text-center z-20 ">
    <h1 class="text-md mb-4 text-black">
{{Session()->get('success')}} </h1>
  </div>

@endif    
</div>



<div class="flex flex-row ml-4">
<button class= "mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out"><a href="{{URL('AddUser')}}"> Add </a></button>
<button class= "mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out"><a href="{{URL('back')}}"> Back </a></button>
</div>




<div class="flex flex-col">
  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
        <thead class="bg-gray-200 border-b">
    <tr>
      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">ID</th>
      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">email</th>
      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Edit</th>
      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">delete</th>


      
     
    </tr>
  </thead>
  <tbody>
    @php 
    $i =1;
    @endphp
    @foreach ($data as $user)
    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$i++}}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user ->name}}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user ->email}}</td>


<td  class="p-3 border-2"><a href="{{URL('edit-user/'.$user->id)}}"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
</svg></a> </td>

<td  class="p-3 border-2"><a href="{{URL('delete-user/'.$user->id)}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
</svg></a> </td>

</tr>
 @endforeach


    
   
    
        </tbody>
      </table>
     </div>
    </div>
  </div>
</div>

