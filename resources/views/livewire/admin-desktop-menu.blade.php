<nav class="hidden  md:flex ">
    <ul class="flex flex-row gap-3">
        <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded">
            <a href="#">Dashboard</a>
         </li>   
         <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded"> 
            <a href="{{url('admin-list')}}">Manage Admin</a>
            </li>
           
            <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded">    
            <a href="{{url('user-list')}}">Manage Users</a>
            </li>

           
            <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded">
            <a href('product-list')}}">Products</a>
            </li>

            <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded">    
            <a href="{{ route('viewcategory' )}}">Categories</a>
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
       