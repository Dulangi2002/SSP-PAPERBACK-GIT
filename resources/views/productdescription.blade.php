<!DOCTYPE html>
<html>

<head>
  @livewireStyles
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="{{ mix('../resources/css/app.css') }}" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body x-data="{openMenu : false}" id="pastel1">




@livewire('navigation-bar')



  @livewireScripts

<div class="">
  <div class="flex max-lg:flex-col min-w-lg bg-white  rounded-lg overflow-hidden">
    <div class="flex-1 max-lg:flex-col" >
    <img src="{{asset('./storage/images/'.$product->image)}}" class=" bg-cover ml-auto mr-auto justify-center lg:w-80 rounded lg:ml-56 lg:mt-24">
    </div> 
    <div class="flex-1 max-lg:flex-col  p-4 my-auto mx-auto lg:mr-56 md:ml-auto md:mr-auto md:justify-center ">
      <h1 class="text-gray-900 font-bold text-2xl  ">{{$product ->name}}</h1>
      <h3 class="text-gray-900 font-semibold text-md pb-5">{{$product ->author}}</h3>
      
      <p class="mt-2 text-gray-600 text-xl ">{{$product ->description}}</p>
      <div class="flex item-center mt-2">
        <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
          <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
        </svg>
        <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
          <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
        </svg>
        <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
          <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
        </svg>
        <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
          <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
        </svg>
        <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
          <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
        </svg>
      </div>
      <div class="flex item-center flex-col justify-between mt-3">
        <h1 class="text-gray-700 font-bold text-xl">LKR {{$product ->price}}</h1>

        <div>
        @livewire('cart', ['productId' => $product-> id] , key($product->id ))
        
    
        </div>
        <button class="px-3 py-2 bg-purple-300  text-black text-xs font-bold uppercase rounded w-56">Reviews</button>

      </div>

      
    </div>
  </div>


</div>

<div>
  @livewire('best-sellers-band')
</div>
</body>



