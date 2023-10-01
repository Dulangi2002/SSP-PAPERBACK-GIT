<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;

class GetProductViews extends Component
{

    public $productData;
    
    public $products = [];

    public function mount()
    {
      $this -> products = product::all();
    }
    public function getViews()
    {
        $this->productData = product::all();
        $this->products = $this->productData->pluck('hits')->toArray();


    }
    public function render()
    {


        return view('livewire.get-product-views', 
         [
            'productData' => $this->productData

         ]);
            
    }

  
}
