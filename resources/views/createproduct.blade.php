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
          <a href="{{ route('profile.show') }}"> {{ __('Profile') }}</a>
        </li>
        <li class="inline-flex py-2 px-3 hover:bg-indigo-300 rounded">
          <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
              {{ __('Log Out') }}</a>
          </form>

        </li>


    </nav>

  </header>


  <!--pop out nav-->
  <nav class="fixed top-0 right-0 bottom-0 left-0 backdrop-blur-sm z-10" :hidden="!openMenu">


    <ul class="absolute top-0 bottom-0 left-0  w-10/12 py-4 bg-white drop-shadow-2xl z-10">
      <li class="border-b border-inherit "><a href="{{url('getadmindashboard')}}" class="block p-4 hover:bg-indigo-300 rounded">Dashboard</a></li>

      <li class="border-b border-inherit "><a href="{{url('admin-list')}}" class="block p-4 hover:bg-indigo-300 rounded">Admin</a></li>
      <li class="border-b border-inherit "><a href="{{url('user-list')}}" class="block p-4 hover:bg-indigo-300 rounded">User</a></li>
      <li class="border-b border-inherit "><a href="{{url('product-list')}}" class="block p-4 hover:bg-indigo-300 rounded">Products</a></li>
      <li class="border-b border-inherit "><a href="{{ route('profile.show') }}" class="block p-4 hover:bg-indigo-300 rounded"> {{ __('Profile') }}</a></li>
      <li class="border-b border-inherit ">
        <form class="block p-4 hover:bg-indigo-300 rounded" method="POST" action="{{ route('logout') }}" x-data>
          @csrf

          <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
            {{ __('Log Out') }}</a>
        </form>
      </li>

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



  <h1 class="text-xl font-semibold mt-4 mb-4 text-center">Create Product</h1>



  <form method="POST" action="{{ route('Saveproduct')}} " enctype="multipart/form-data" class="mb-3">
    @csrf

  


    <div class="flex flex-row ">

      <button class="mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out" type="submit" @click="SubmitCreateProduct">Submit</button><br>
      <button class="mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out"><a href="{{url('backtoproducts')}}">back</a> </button>
    </div>



    <div class="space-y-12 mx-6">

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="product-name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
          <div class="mt-2">
            <input class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="name" value="{{old('name')}}">
            <div>@error('name'){{$message}}@enderror</div>

          </div>
        </div>
      </div>


      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="author" class="block text-sm font-medium leading-6 text-gray-900">Author</label>
          <div class="mt-2">
            <input class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 
            shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
             focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
             type="text" name="author" value="{{old('author')}}">
            <div>@error('author'){{$message}}@enderror</div>
          </div>
        </div>


        <div class="sm:col-span-3">
          <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
          <div class="mt-2">
            <input class="pl-2 block w-full rounded-md border-0 py-1.5 
            text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
            focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
            type="text" name="description" value="{{old('description')}}">
            <div> @error('description'){{$message}}@enderror </div>

          </div>
        </div>


        <div class="sm:col-span-3">
          <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
          
          <div class="mt-2">
      
            <select name="category" id="category">
              @foreach($categories as $category)
              <option value="{{ $category['id'] }}"  >{{ $category['category_name'] }}</option>
              @endforeach
              <div> @error('category'){{$message}} @enderror</div>

            </select>


          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
          <div class="mt-2">
            <input class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="double" name="price" value="{{old('price')}}">
            <div> @error('price') {{$message}}@enderror </div>
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="stock" class="block text-sm font-medium leading-6 text-gray-900">stock</label>
          <div class="mt-2">
            <input class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  type="number" name="stock" value="{{old('stock')}}">
        <div>@error('stock') {{$message}} @enderror</div>
          </div>
       </div>


        <div class="sm:col-span-3">
          <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
          <div class="mt-2">
            <input id="image" type="file" name="image" class="pl-2 block w-full rounded-md border-0 py-1.5
             text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
              focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <div> @error('image'){{$message}} @enderror </div>
          </div>
        </div>

        <script>
          function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
              var reader = new FileReader();
              reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
              }
              reader.readAsDataURL(file);
            }
          }
        </script>


      </div>
    </div>


  </form>
</body>
