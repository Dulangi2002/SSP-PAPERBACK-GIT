<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Queue\Listener;
use Livewire\Component;

class Categories extends Component
{


    public $categories;
    public $showEdit = false;
    public $category_id;

    public $category_name;
    public $category_slug;
    public $category_status;

    public $category;

    public $category_order;
    
    protected $listeners = [
        'categoryAdded' => 'mount',
       
    ];

 
    public function mount()
    {
        $this->categories = Category::all();
 
    }

    public function loadCategoryData($category_id){
        $category = Category::find($category_id);
        $this->category_id = $category->id;
        $this->category_name = $category->category_name;
        $this->category_slug = $category->category_slug;
        $this->category_status = $category->category_status;
        $this->category_order = $category->category_order;
    }


    public function refreshCategoriesPage(){
        $this->categories = Category::all();
    }

    public function editCategory(){
        $category =  Category::find($this->category_id);
        $this->category = $category;
    
   
        $this -> validate([
            'category_name' => 'required|unique:categories,category_name,'.$this->category->id,
            'category_slug' => 'required|unique:categories,category_slug,'.$this->category->id.'|regex:/^[a-zA-Z0-9-]+$/',
            
        ]);

        $default_category_status = $this->category_status ? : 1;
        $default_category_order = $this->category_order ? : 0;

        $category->update([
            'category_name' => $this->category_name,
            'category_slug' => $this->category_slug,
            'category_status' => $default_category_status,
            'category_order' => $default_category_order,    
        ]);

        $category->save();
    

        $this->emit('categoryAdded','Category Updated Successfully');

        $this -> categories = Category::all();


        $this->showEdit = false;
       
       
    }


    public function deleteCategory($category_id){
        $category = Category::find($category_id);
        $category->delete();
        $this->emit('categoryAdded','Category Deleted Successfully');
        $this -> categories = Category::all();
    }



    
    public function render()
    {
        return view('livewire.categories' ,
        [
            'categories' => $this->categories
        ]
    );
    }




  
}
