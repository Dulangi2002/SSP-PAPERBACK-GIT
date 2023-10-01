<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class DeleteCategory extends Component
{

    public $category;
    public $categories;
    public $category_id;
    /*protected $listeners = [
        'delete' => 'showPopUp' ,
        
    ];*/

    //mount function
   /* public function mount(Category $category)
    {
        $this->category = $category;
    }*/

    public function mount(){
      
        $this->categories = Category::all();
          
       // $this->category = $category;
    }


  

    public function delete($category_id)
    {
        $category = Category::find($category_id);
        if($category){
            $category->delete();
            $this->emit('category-deleted');
          
        }


        /*$category_id = $this->category->id;
        Category::find($category_id)->delete();
        $this->emit('category-deleted');
        $this ->categories = Category::all();
        //$this->emit('category-deleted');
       // $this -> mount();*/

     }
    
    public function render()
    {
        return view('livewire.delete-category');
    }


}
