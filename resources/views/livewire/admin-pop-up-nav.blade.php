
<nav class="fixed top-0 right-0 bottom-0 left-0 backdrop-blur-sm z-10 "  :hidden="!openMenu">

<ul class="absolute top-0 bottom-0 left-0  w-10/12 py-4 bg-white drop-shadow-2xl z-10">
   <li class="border-b border-inherit "><a href="{{url('admin-list')}}" class="block p-4 hover:bg-indigo-300 rounded">Dashboard</a></li>
   <li class="border-b border-inherit "><a href="{{url('admin-list')}}" class="block p-4 hover:bg-indigo-300 rounded">Admin</a></li>
   <li class="border-b border-inherit "><a href="{{url('user-list')}}" class="block p-4 hover:bg-indigo-300 rounded">User</a></li>
   <li class="border-b border-inherit "><a href="{{url('product-list')}}" class="block p-4 hover:bg-indigo-300 rounded" >Products</a></li>
   <li class="border-b border-inherit "><a href="{{ route('viewcategory')}}" class="block p-4 hover:bg-indigo-300 rounded" >Categories</a></li>

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
