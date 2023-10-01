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


<form  id="popup-form" wire:submit.prevent="addCategory" >
<div>
<label for="category_name">Name</label>
<input type="text" name="category_name"  wire:model="category_name">
</div>


<div>
<label for="category_slug">Slug</label>
<input type="text" name="category_slug"  wire:model="category_slug">

</div>


<div>
<label for="category_status"></label>
<input type="text" name="category_status" wire:model="category_status" hidden>
</div>

<div>
<label for="category_order"></label>
<input type="text" name="category_order"  wire:model="category_order" hidden>
</div>


<button type="submit">Submit</button>

</form>
</div>


<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 500)" 
    x-show="show"
    class="alert alert-success">
    {{ session('message') }}
</div>

</div>

