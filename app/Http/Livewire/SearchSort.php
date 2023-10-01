<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\product;
use Livewire\Component;

use URL;

use function Laravel\Prompts\search;

class SearchSort extends Component
{




    public $search;

    protected $queryString = ['search' => ['except' => '', 'as' => 'q']];
    public $sortedProducts;

    public $categories;

    public $category_name;



    public function mount()
    {
       
        $categories = Category::all();
        $this->categories = $categories;
    }
   

    public function sortByCategory($category_name)
    {

        $this->category_name = $category_name;
        
        //dd($category_name);
       /*$fetch = product::query();
        if (strlen($category_name) >= 2) {
            $fetch->where('category', 'like', '%' . $category_name . '%')->get();
        }

        $this->sortedProducts = $fetch->get();*/
       //  dd($this->sortedProducts);*/


    }


    public function sortBySearch($category_name)
    {
        $this->category_name = $category_name;

        $fetch = Product::query();

        if (strlen($this->search) >= 2) {
            $fetch->where('name', 'like', '%' . $this->search . '%');
        }

        if (strlen($category_name) >= 2 && $category_name != "All") {
            $fetch->where('category', 'like', '%' . $category_name . '%')->get();
        }
        if (strlen($category_name) >= 2 && $category_name == "All") {
            $fetch->get();
        }



        

        $this->sortedProducts = $fetch->get();
    }



    public function render()
    {
       $this->sortBySearch($this->category_name);
    
       if (!empty($this->category_name) && strlen($this->category_name) >= 2) {
        $this->sortByCategory($this->category_name);
    }

        return view('livewire.search-sort', [
            'products' => $this->sortedProducts,
        ]);
    }
}
