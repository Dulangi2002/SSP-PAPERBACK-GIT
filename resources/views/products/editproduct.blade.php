
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

        @if(Session::has('success'))
        <div>
        {{Session::get('success')}} 
        </div>
        @endif    



 <!--<div class="mt-6 flex items-center justify-start gap-x-2  ml-6">


<button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 " >Update</button><br>

<button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" ><a href="{{url('back-productlist')}}">Back</a></button><br>


</div>-->

<h1 class="text-xl font-semibold mt-4 mb-4 text-center">Edit product details</h1>





 <form method="POST" action="{{route('updateproduct')}}" enctype="multipart/form-data">
  @csrf
<div class="flex flex-row">


<button type="submit" class="font-[dm-sans] ml-6 mt-4 mb-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out" >Update</button><br>

<a href="{{url('backtoproducts')}}" class="font-[dm-sans] ml-6 mt-4 mb-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out" >Back</a><br>


</div>




        <input type="hidden" name="id" value="{{$data->id}}">
        
  

        <div class="space-y-12 mx-6">

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">



        <div class="sm:col-span-3">

       <label  class="block text-sm font-medium leading-6 text-gray-900">Product name</label>
        <div class="mt-2">
        <input class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  type="text" name="name" value="{{$data->name}}">
        <div> @error('name'){{$message}}@enderror</div>
        </div>
        </div>
        </div>
    



        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">

        <label class="block text-sm font-medium leading-6 text-gray-900">Product author</label>
        <div class="mt-2">
        <input class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="author" value="{{$data->author}}">
        <div> @error('author'){{$message}}@enderror</div>
        </div>
        </div>






       <div class="sm:col-span-3">
        <label class="block text-sm font-medium leading-6 text-gray-900" >Product description</label>
        <div class="mt-2">
        <input   class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"   type="text" name="description" value="{{$data->description}}">
        <div>@error('description'){{$message}} @enderror </div>
        </div>
        </div>






        <div class="sm:col-span-3">
        <label  class="block text-sm font-medium leading-6 text-gray-900"> Category </label>
        <div class="mt-2">
        <input  class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  type="text" name="category"value="{{$data->category}}" >
        <div>@error('category'){{$message}}@enderror</div>
        </div>
        </div>






        <div class="sm:col-span-3">
        <label class="block text-sm font-medium leading-6 text-gray-900"> Price </label>
        <div class="mt-2">
        <input class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  type="double" name="price" value="{{$data->price}}" >
        <div> @error('price') {{$message}} @enderror</div>
        </div>
        </div>



        <div class="sm:col-span-3">
        <label class="block text-sm font-medium leading-6 text-gray-900">stock </label>
        <div class="mt-2">
        <input class="pl-2 block w-full rounded-md border-0 py-1.5 
        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
        placeholder:text-gray-400 focus:ring-2 focus:ring-inset
        focus:ring-indigo-600 sm:text-sm sm:leading-6" 
        type="number" name="stock" value="{{$data->stock}}" >
        <div>  @error('stock'){{$message}}@enderror</div>
        </div>
        </div>  



        <div class="sm:col-span-3">
        <label class="block text-sm font-medium leading-6 text-gray-900">image </label>
        <div class="mt-2">
        <input class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"    type="file" name="image" value="{{$data->image}}" >
        <img src="{{asset('./storage/images/'.$data->image)}}" width="100px" height="100px" alt="image">  
        <div> @error('image') {{$message}} @enderror</div>
        </div>
        </div>


      </div>
    </div>



</div>
</div>
</nav>
</form>
</body>
</html>


