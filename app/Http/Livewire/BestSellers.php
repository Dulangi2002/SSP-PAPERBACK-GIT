<?php

namespace App\Http\Livewire;

use App\Models\orders;
use App\Models\product;
use Livewire\Component;

class BestSellers extends Component
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

        //dd ($this->bestSellers);
        
        
        
     
    }

    public function render()
    {
        return view('livewire.best-sellers');
    }
}
