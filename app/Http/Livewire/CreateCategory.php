<?php

namespace App\Http\Livewire;

use App\Http\Requests\validateCategory;
use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{


    public $category_name;
    public $category_slug;
    public $category_status;
    public $category_order;
     
    public $categories;
    public $showCreateCategoryForm = false;
 


    public function mount(){
        $this -> categories = Category::all();

    }
    
     
  
 
    public function addCategory(){
        $this -> validate([
            'category_name' => 'required|unique:categories',
            'category_slug' => 'required|unique:categories|regex:/^[a-zA-Z0-9-]+$/',
            
        ]);

        $default_category_status = $this->category_status ? : 1;
        $default_category_order = $this->category_order ? : 0;


        Category::create(
            [
                'category_name' => $this->category_name,
                'category_slug' => $this->category_slug,
                'category_status' => $default_category_status,
                'category_order' => $default_category_order,
            ]
        
        );
        
        $this->reset();
        $this->emit('categoryAdded','Category Created Successfully');
        $this -> showCreateCategoryForm = false;
  
    }

  


    public function render()
    {

        return view('livewire.create-category',
        [
            'categories' => Category::all(),
        ]);
    }
}
