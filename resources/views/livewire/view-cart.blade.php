<div class=" w-full"  id="cart">
    <div class="flex flex-row ">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mt-8 ml-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
        </svg>

        <h1 class="font-merriweather text-3xl pl-4 pt-8">
            The Cart</h1>

    </div>
 

    <div class="flex flex-col bg-white lg:absolute lg:right-0 lg:p-4 lg:mr-56  sm:ml-8 md:ml-8 "  id="cart-details-box"> 


    <div class="flex space-x-4 text-xl font[roboto] ">
            <h1>Total Cart Items:</h1>
            <h1> {{ $total_cart_items }}</h1>
        </div>

        <div class="flex space-x-4 text-xl font-bold  font-[roboto] ">
            <h1>Total Price:</h1>
            <h1> ${{ $total_price }}</h1>
        </div>
     
        <div class=" text-center" id="proceed-to-checkout-button">
            <a href="{{ route('getContactForm') }}">Proceed to checkout</a>
        </div>
    </div>

    <!-- <h1>User ID: {{ $user_id }}</h1> -->
<div class="grid lg:grid-cols-2 gap-4 md:grid-cols-1 sm:grid-cols-1  lg:w-2/3 h-full sm:w-56 " >
    @if($products != null && $products->count() > 0)

        @foreach($products as $product)
        <div>
            <div class="" id="grid-box">
                <div class="flex py-6 flex-row  px-4 rounded  mt-8 ">
                    <div class="flex-shrink-0 overflow-hidden rounded-md  h-full ">
                        <img src="{{ asset('img/' . $product->image) }}" alt="product image" class="h-64">
                    </div>

                    <div class=" flex flex-1 flex-col  m-4">
                        <div>
                            <div class="flex  text-base font-medium text-gray-900 font-[merriweather] text-xl" id="product-title-cart">

                                <h1> {{ $product->name }}</h1>

                            </div>

                        </div>
                        <div class="flex flex-col justify-between mt-4">
                            <p class="font-[roboto] text-xl">Price: ${{ $product->price }} </p>

                            <p class="font-[roboto]  "> Quantity: {{ $product->pivot->quantity }} </p>
                            <p class="font-[roboto] "> Total Price: ${{ $product->pivot->total_price_per_product }} </p>



                            <div class="flex space-x-4 justify-start items-center mt-2  ">


                                <button wire:click="increment({{ $product->id  }})" class="flex  bg-purple-300  text-3xl
                         justify-center p-2 w-full rounded-lg font-[dm-sans] hover:bg-white border-2 border-purple-500 gap-1" id="increment-decrement-button">+</button>


                                <h1 class="text-2xl  font-[roboto]">{{ $product->pivot->quantity }}</h1>

                                <button wire:click="decrement({{ $product->id }})" class="flex  bg-purple-300  text-3xl
                         justify-center  w-full rounded-lg font-[dm-sans] hover:bg-white border-2 border-purple-500 gap-1" id="increment-decrement-button"> - </button>


                            </div>
                            <div class="w-24 mt-2">

                                <button wire:click="delete({{ $product->id }})" class="mt-2  bg-white justify-center 
                              w-full rounded-lg font-[roboto]  gap-1" id="delete-button">
                            DEL</button>
                            </div>
                        </div>

                    </div>



                </div>
            </div>

</div>

        @endforeach

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
        <p>Your cart is empty.</p>
        @endif
    </div>
</div>


<!-- Popup -->
<div x-show="isOpen" class="fixed top-0 right-0 left-0 align-center text-center  m-4 p-4 bg-purple-500 text-white rounded shadow">
    <p x-text="message"></p>
</div>
</div>