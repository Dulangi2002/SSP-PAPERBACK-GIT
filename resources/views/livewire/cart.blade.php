<div>
<button 
 class="flex flex-row mt-2 ml-2 bg-purple-300 mr-auto ml-auto justify-center p-3 w-full rounded-lg font-[dm-sans]
hover:bg-white border-2 border-purple-500 gap-1" wire:click="addToCart" >
Add to cart
</button>



<button wire:click="increment" class="flex flex-row mt-2 ml-2 bg-purple-300 mr-auto ml-auto 
justify-center p-3 w-full rounded-lg font-[dm-sans] hover:bg-white border-2 border-purple-500 gap-1">+1</button>
<h1>{{ $quantity }}</h1>
<button wire:click="decrement" class="flex flex-row mt-2 ml-2 bg-purple-300 mr-auto ml-auto justify-center
 p-3 w-full rounded-lg font-[dm-sans] hover:bg-white border-2 border-purple-500 gap-1">-1</button>
</div>


<div x-data="{ isOpen: false, message: '' }" x-init="() => { 
    Livewire.on('productAddedToCart', (newMessage) => {
        isOpen = true;
        message = newMessage;
        setTimeout(() => {
            isOpen = false;
        }, 2000); // Close the popup after 2 seconds
    });
}">
    <!-- Popup -->
    <div x-show="isOpen" class="fixed top-0 right-0 left-0 align-center text-center  m-4 p-4 bg-purple-500 text-white rounded shadow">
        <p x-text="message"></p>
    </div>
</div>

