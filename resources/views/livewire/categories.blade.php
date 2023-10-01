<div>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <div class="w-1/4">
                    <h1 class="text-3xl font-bold">Categories</h1>
                </div>
            </div>
            <table class="min-w-full">
                <thead class="bg-gray-200 border-b ">
                    <tr class="bg-gray-100">
                        <!-- <th class="px-4 py-2 w-20">No.</th> -->
                        <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
                        <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Slug</th>
                        <!-- <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Status</th>
                        <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Order</th> -->
                        <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Edit</th>
                        <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 hidden">{{ $category->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->category_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 ">{{ $category->category_slug }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 hidden">{{ $category->category_status }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 hidden">{{ $category->category_order }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">

                            <div x-data="{ showEdit: false }">

                                <button @click="showEdit = true" wire:click="loadCategoryData({{ $category -> id}})"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                    Edit </button>

                                <div x-show="showEdit">


                                    <form id="popup-form" wire:submit.prevent="editCategory">
                                        <div>
                                            <label for="category_id"></label>
                                            @error('category_id
                                            ') <span class="error">{{ $message }}</span> @enderror
                                            <input type="text" name="category_id" id="category_id" wire:model="category_id" value="{{$category ->category_id}}" hidden >
                                        </div>

                                        <div>
                                            <label for="category_name">Name</label>
                                            @error('category_name') <span class="error">{{ $message }}</span> @enderror
                                            <input type="text" name="category_name" id="category_name" wire:model="category_name" value="{{$category -> category_name}}">
                                        </div>

                                        <div>
                                            <label for="category_slug">Slug</label>
                                            @error('category_slug') <span class="error">{{ $message }}</span> @enderror
                                            <input type="text" name="category_slug" id="category_slug" wire:model="category_slug" value="{{$category -> category_slug}}">
                                        </div>

                                        <div>
                                            <label for="category_status"></label>
                                            @error('category_status') <span class="error">{{ $message }}</span> @enderror
                                            <input type="text" name="category_status" id="category_status" wire:model="category_status" value="{{$category -> category_status}}" hidden>
                                        </div>

                                        <div>
                                            <label for="category_order"></label>
                                            @error('category_order') <span class="error">{{ $message }}</span> @enderror
                                            <input type="text" name="category_order" id="category_order" wire:model="category_order" value="{{$category -> category_order}}" hidden>
                                        </div>


                                

                                        <div><button wire:click="editCategory" class="bg-red-500 hover:bg-red-700 text-white ">Update</button></div>
                                        <div> <button type="button" x-on:click="showEdit=false" >close</button></div>
                                    </form>
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
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <button wire:click="deleteCategory({{ $category -> id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                Delete </button>
                        </td>

                    </tr>



                    @endforeach
                </tbody>
            </table>

        </div>
        <div x-data="{ isOpen: false, message: '' }" x-init="() => { 
    Livewire.on('categoryAdded', (newMessage) => {
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
</div>