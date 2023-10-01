
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-full lg:px-8 bg-white">
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
    @foreach($bestSellers as $product)
    <div class="group bg-white-300 p-3 rounded-lg shadow-md shadow-purple-100">
    <a href="/details/{{$product['id']}}">
              <div class="aspect-h-1 aspect-w-1 w-64  overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-1 xl:aspect-w-1">
              <!-- <img src="{{ asset('./storage/images/'.$product->image) }}"  alt="{{$product ->image}}" class="h-70 w-full object-cover object-center group-hover:opacity-75"> --> 
               <img src="{{asset('./storage/images/'.$product->image)}}"  alt="{{$product ->image}}" class=" w-full object-cover object-center group-hover:opacity-75 ">
                 <!-- <img src="{{ asset('./storage/images/'.$product->image) }}"   alt="{{$product ->image}}" class="h-70 w-full object-cover object-center group-hover:opacity-75"> -->
              </div>
              <div class="flex flex-col">
                <h3 class="mt-4 text-xl text-gray-700 font-medium">{{$product ->name}}</h3>
                <p class="mt-1 text-xl  text-gray-900">{{$product -> author}}</p>
                <p class="mt-1 text-xl  text-gray-900">LKR {{$product -> price}}</p>
              
            </a>
          </div>
        </div>
    @endforeach
</div>
