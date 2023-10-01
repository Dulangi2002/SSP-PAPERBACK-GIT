<?php

namespace App\Http\Livewire;

use App\Models\orders;
use App\Models\product;
use Livewire\Component;

class BestSellersBand extends Component
{

    public $bestSellers;

    public function mount()
    {
        $this->getBestSellers();
    
    }

    public function getBestSellers(){
        $orders = orders::whereMonth('created_at', date('m'))->get();
        
        $orderIds = $orders->pluck('id');
        $orderItems = orders::find($orderIds)->pluck('products');
        $FrequentlyOccuringOrder = $orderItems->flatten()->pluck('name')->countBy()->sortDesc()->take(3);
        $this->bestSellers = $FrequentlyOccuringOrder;
        $this -> bestSellers = [];
        foreach($FrequentlyOccuringOrder as $key => $value){
            $product = Product::where('name', $key)->first();
            
            // If the product with the given name is found, add it to the bestSellers array
            if ($product) {
                $this->bestSellers[] = $product;
            }
        }
      
        //dd ($this->bestSellers);
        
        
     
    }
    public function render()
    {
        return view('livewire.best-sellers-band');
    }
}
