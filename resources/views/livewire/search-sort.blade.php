<div>
  <div class="w-full flex flex-col items-center justify-center mt-8" id="test">
    <div class="w-11/12 md:w-8/12 xl:w-1/2 h-auto p-5 rounded-3xl bg-black  border-2 border-white-600 ">
      <section class="w-full h-5 flex items-center ">
        <span class="w-10 h-full hidden md:flex items-cente">
          <i class="text-xl"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg></i> </span>
        <input id="border" class="w-full h-10 font-[dm sans] text-2xl font-thin text-purple-300 md:pl-2 border-2 border-none focus:ring-0 bg-black " wire:model.debounce.500ms="search" type="text" placeholder="search items" />
        <button class="w-28 h-10 bg-purple-300 flex justify-center items-center rounded-2xl text-black-font-medium text-lg font-[dm-sans]">Search </button>
      </section>
    </div>
  </div>



    <div class="overflow-x-auto  whitespace-nowrap  mt-4 scrollbar-hide w-96 ml-auto mr-auto  justify-center" id="categories">
      <ul class=" gap-x-10  mt-auto flex flex-row ml-auto mr-auto">
     
      @foreach($categories as $category)

        <li   class="border-black-300 border-2 p-3 text-lg font-[dms-sans] font-medium rounded-3xl bg-black text-white ">
          <a wire:click="sortByCategory('{{ $category->category_name }}')" class="cursor-pointer" wire:model="category_name">
            {{ $category -> category_name}}
         
          </a>
        </li>
      @endforeach

      </ul>
    </div>



  <div class="pastel" id="pastel">

    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 mt-8" >
      

        @if($sortedProducts)
          @foreach($sortedProducts as $product)
          <div class="group bg-white p-3 rounded-lg shadow-md shadow-purple-100">
            <a href="details/{{$product['id']}}">
              <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
              <!-- <img src="{{ asset('./storage/images/'.$product->image) }}"  alt="{{$product ->image}}" class="h-70 w-full object-cover object-center group-hover:opacity-75"> --> 
               <img src="{{asset('./storage/images/'.$product->image)}}"  alt="{{$product ->image}}" class="h-70 w-full object-cover object-center group-hover:opacity-75 ">
                 <!-- <img src="{{ asset('./storage/images/'.$product->image) }}"   alt="{{$product ->image}}" class="h-70 w-full object-cover object-center group-hover:opacity-75"> -->
              </div>
              <div class="flex flex-col">
                <h3 class="mt-4 text-xl text-gray-700 font-medium ">{{$product ->name}}</h3>
                <p class="mt-1 text-sm  text-gray-900">{{$product -> author}}</p>
                <p class="mt-1 text-md  text-gray-900 font-medium">LKR {{$product -> price}}</p>
            </a>
          </div>
        </div>
        @endforeach
      @else
      <h1>no</h1>
      @endif
    </div>

 
  </div>
</div>
<div class="   w-full text-center  font-[DM-sans] text-2xl h-24 z-0 -mt-56 " id="row1">

    </div>
    <div class="   w-full text-center  font-[DM-sans] text-2xl h-24 " id="row2">

    </div><div class="   w-full text-center  font-[DM-sans] text-2xl h-24 " id="row3">

    </div><div class="   w-full text-center  font-[DM-sans] text-2xl h-24 " id="row4">

    </div>