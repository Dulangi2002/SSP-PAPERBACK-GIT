<div x-data="{ open : @entangle('showCreateCategoryForm') }">
    <button>
        <span @click="open = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Create a new category
        </span>
    </button>


    <div  x-show="open" @@click.outside="open = false"> 
@error('category_name') <span class="error">{{ $message }}</span> @enderror
@error('category_slug') <span class="error">{{ $message }}</span> @enderror
@error('category_status') <span class="error">{{ $message }}</span> @enderror
@error('category_order') <span class="error">{{ $message }}</span> @enderror

<div class="w-full max-w-md absolute m-auto left-0 right-0">


<form  id="popup-form" wire:submit.prevent="addCategory" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
<div  class="mb-4 " >
<label for="category_name"class="block text-gray-700 text-sm font-bold mb-2">Name</label>
<input type="text" name="category_name"  wire:model="category_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>


<div class="mb-6">
<label for="category_slug"  class="block text-gray-700 text-sm font-bold mb-2">Slug</label>
<input type="text" name="category_slug"  wire:model="category_slug"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

</div>


<div>
<label for="category_status"></label>
<input type="text" name="category_status" wire:model="category_status" hidden>
</div>

<div>
<label for="category_order"></label>
<input type="text" name="category_order"  wire:model="category_order" hidden>
</div>

<div class="flex items-center justify-between">
<button type="submit"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>


</div>

</form>

</div>
</div>


<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 500)" 
    x-show="show"
    class="alert alert-success">
    {{ session('message') }}
</div>

</div>
