<div class=" w-full" >
    <div class="flex flex-row ">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mt-8 ml-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
        </svg>

        <h1 class="font-merriweather text-3xl pl-4 pt-8">
            The Cart</h1>

    </div>




    <!-- <h1>User ID: {{ $user_id }}</h1> -->
    <!-- <div class="grid lg:grid-cols-2 gap-4 md:grid-cols-1 sm:grid-cols-1  lg:w-2/3 h-full sm:w-56 " > -->
        <div class="bg-white border-2  lg:right-0 lg:mr-20 lg:absolute h-96 flex flex-col justify-between p-5 rounded-lg lg:w-1/4 w-2/3 md:mt-10 sm:mt-10 m-auto  " id="cart-details-box">


            <div class="flex flex-col  text-xl font[roboto] ">
                <div class="flex flex-row items-baseline justify-between ">
                <h3 class="text-md font-bold">Total Cart Items:</h3>
                <h1 class="text-lg"> {{ $total_cart_items }}</h1>

                </div>

                <div class="flex flex-row items-baseline justify-between">

                <h3 class="text-md font-bold">Total Price:</h3>
                <h1 class="text-lg"> ${{ $total_price }}</h1>
                </div>
               
            </div>

           

            <div class=" text-center bg-none border-2 border-black p-5 hover:bg-green-400 hover:border-none  " >
                <a href="{{ route('getContactForm') }}">Proceed to checkout</a>
            </div>
        </div>
    @if($products != null && $products->count() > 0)
    <div class="grid lg:grid-cols-2  ">



        <div class=" m-8 grid lg:grid-cols-1 sm:grid-cols-1 md:grid-cols-1 bg-white ">


            @foreach($products as $product)

            <div class="border-r border-b border-l  lg:border-t p-4 flex  lg:flex-row lg:flex-wrap justify-between mt-4" id="cart-box">
                <div class="flex items-center ">
                    <img src="{{asset('./storage/images/'.$product->image)}}" alt="product image" class="h-64 border rounded " id="cart-image-product">
                </div>
                <div class=" flex flex-col  gap-8 mt-8" id="box">
                    <div id="item-details-box">

                        <p class="text-gray-700 text-base font-bold font-[dm sans] text-xl ">{{ $product->name }}</p>
                        <p class="text-gray-700 text-base text-lg mt-2 ">Price: ${{ $product->price }} </p>
                        <p class="text-lg  "> Quantity: {{ $product->pivot->quantity }} </p>

                        <p class="text-lg  "> Total Price: ${{ $product->pivot->total_price_per_product }} </p>

                    </div>

                    <div class="flex lg:flex-row flex-row  gap-4" id="button-box">
                        <button wire:click="increment({{ $product->id  }})" class="lg:w-24 w-8 p-2 rounded" id="increment-decrement-buttons">+</button>


                        <h1 class=" lg:w-24 w-8 text-center p-2 rounded" id="quantity">{{ $product->pivot->quantity }}</h1>

                        <button wire:click="decrement({{ $product->id }})" class="lg:w-24 w-8 p-2 rounded" id="increment-decrement-buttons"> - </button>

                        <button wire:click="delete({{ $product->id }})" class="bg-red-700  p-2 rounded"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></button>

                    </div>




                </div>




            </div>







            @endforeach
        </div>
    </div>

</div>




{{--<div x-data="{ open: @entangle('showPopUp') }">

    <button @click="open = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Proceed to checkout
     </button>

 <div x-show="open" @click.outside = "open = false" >@livewire('contact-form' )</div>
</div>--}}

<div x-data="{ isOpen: false, message: '' }" x-init="() => { 
    Livewire.on('productAddedToCart', (newMessage) => {
        isOpen = true;
        message = newMessage;
        setTimeout(() => {
            isOpen = false;
        }, 2000); // Close the popup after 2 seconds
    });
}">

    @else
    <p class="text-red-800 text-5xl font-bold m-56 ">Your cart is empty.</p>
    @endif
</div>
</div>


<!-- Popup -->
<div x-show="isOpen" class="fixed top-0 right-0 left-0 align-center text-center  m-4 p-4 bg-purple-500 text-white rounded shadow">
    <p x-text="message"></p>
</div>

@livewire('footer' )
</div>