<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $category;

    public $categories;
    public $category_name;
    public $category_slug;
    public $category_status;
    public $category_order;

    public $category_id;
    public $showEdit = false;
     
 
      


    public function mount(){

        
        $this -> categories = Category::all();
        $this ->category_id = $this -> category->id;
        $this->category_name = $this->category->category_name;
        $this->category_slug = $this->category->category_slug;
        
    }


    public function editCategory(){
        $category = Category::where('id',$this->category_id)->first();
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

  
    


    public function render()
    {
        return view('livewire.edit-category'
    );
    }
}
