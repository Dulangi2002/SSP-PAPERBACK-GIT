<div class="md:grid md:grid-cols-3 md:gap-6">
<x-section-title >
        <x-slot name="title">Save address</x-slot>
        <x-slot name="description">To make purchasing easy add an address</x-slot>
    </x-section-title>
   
    <div class="mt-5 md:mt-0 md:col-span-2 ">


    <form action="">
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md sm:rounded-md ">
     <div  class="flex flex-col">
      
        <label for="ContactNumber"> Contact Number</label>
        @error('ContactNumber') <span class="error">{{ $message }}</span> @enderror
        <input type="text" wire:model="ContactNumber" class="rounded border-1 border-gray-300 w-2/3"> 

        <label for="houseNumber"> House Number</label>
        @error('houseNumber') <span class="error">{{ $message }}</span> @enderror
        <input type="text" wire:model="houseNumber" class="rounded border-1 border-gray-300 w-2/3">

        <label for="streetAddress"> Street Address</label>
        @error('streetAddress') <span class="error">{{ $message }}</span> @enderror
        <input type="text" wire:model="streetAddress" class="rounded border-1 border-gray-300 w-2/3">

        <label for="city"> City</label>
        @error('city') <span class="error">{{ $message }}</span> @enderror
        <input type="text" wire:model="city" class="rounded border-1 border-gray-300 w-2/3">


        <div id="buttonContainer" x-data="{ showButton: @entangle('showButton') }" >

            <button wire:click.prevent="saveAddress" x-show="showButton" class="flex items-center justify-end px-4 py-3 bg-black text-white text-right sm:px-4 shadow rounded  mt-4 ">Save</button>

        </div>

        <div id="buttonContainer" x-data="{ showUpdateButton: @entangle('showUpdateButton') }">

            <button wire:click.prevent="updateAddress" x-show="showUpdateButton" class="flex items-center justify-end px-4 py-3 bg-black text-white text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">Update</button>

        </div>

        </div>
        </div>
    </form>
    </div>





<div x-data="{ isOpen: false, message: '' }" x-init="() => { 
    Livewire.on('ContactDetails', (newMessage) => {
        isOpen = true;
        message = newMessage;
        setTimeout(() => {
            isOpen = false;
        }, 2000); // Close the popup after 2 seconds
    });
}">
</div>

</div>

