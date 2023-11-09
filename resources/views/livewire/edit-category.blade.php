
<div x-data="{ showEdit: @entangle('showEdit') }">

    <button @click="showEdit = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        Edit </button>

    <div x-show="showEdit">
 
        <div class="w-full max-w-xs ">

     
        <form id="popup-form" wire:submit.prevent="editCategory" class="edit-category-form">
        <div class="mb-4">
                <label for="category_id"  class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                @error('category_id
                ') <span class="error">{{ $message }}</span> @enderror
                <input type="text" name="category_id" id="category_id" wire:model="category_id" value="{{$category -> category_id}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
            </div>

            <div class="mb-4">
                <label for="category_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                @error('category_name') <span class="error">{{ $message }}</span> @enderror
                <input type="text" name="category_name" id="category_name" wire:model="category_name" value="{{$category -> category_name}}" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-6">
                <label for="category_slug" class="block text-gray-700 text-sm font-bold mb-2">Slug</label>
                @error('category_slug') <span class="error">{{ $message }}</span> @enderror

                <input type="text" name="category_slug" id="category_slug" wire:model="category_slug" value="{{$category -> category_slug}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" >

            </div>

            <div>
                <label for="category_status"></label>
                <input type="text" name="category_status" id="category_status" wire:model="category_status" hidden>

            </div>


            <div>
                <label for="category_order"></label>
                <input type="text" name="category_order" id="category_order" wire:model="category_order" hidden>
            </div>


            <div class="flex items-center justify-between "><button wire:click="editCategory({{ $category->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button></div>
            <div class="flex items-center justify-between"> <button type="button" x-on:click="showEdit=false" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">close</button></div>
        </form>
        </div>
    </div>


    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 500)" x-show="show" class="alert alert-success">
        {{ session('message') }}
    </div>
    <div x-data="{ isOpen: false, message: '' }" x-init="() => { 
    Livewire.on('categoryUpdated', (newMessage) => {
        isOpen = true;
        message = newMessage;
        setTimeout(() => {
            isOpen = false;
        }, 2000); // Close the popup after 2 seconds
    });
}">
        <!-- Popup -->
        <div x-show="isOpen" class="fixed top-0 right-0 left-0 align-center text-center  m-4 p-4 bg-green-500 text-white rounded shadow">
            <p x-text="message"></p>
        </div>
    </div>
</div>