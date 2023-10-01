<?php

namespace App\Http\Livewire;

use App\Models\TheCart;
use Livewire\Component;

class CartAbandonmentRate extends Component
{

    public $cartAbandonmentRate;


    public function mount()
    {
        $this->cartAbandonmentRate = $this->getCartAbandonmentRate();
    }

    public function getCartAbandonmentRate(){
        $totalCarts = TheCart::count();
        $previousMonth = date('Y-m', strtotime('-1 month'));  
        $totalAbandonedCarts = TheCart::whereMonth('created_at', $previousMonth)->where('status', 'pending')->count(); 
        $cartAbandonmentRate = ($totalAbandonedCarts / $totalCarts) * 100;
        $this->cartAbandonmentRate = round($cartAbandonmentRate, 2);
        return $this->cartAbandonmentRate;


    }




    public function render()
    {
        return view('livewire.cart-abandonment-rate');
    }
}
