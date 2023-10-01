<?php

namespace App\Http\Livewire;

use App\Models\TheCart;
use Livewire\Component;

class CartIcon extends Component
{

    public $total_cart_items;

    public $user;

    

    protected $listeners = [
        'refreshParent' => 'refresh',
    ];

    public function refresh(){
        
        $user = auth()->user();
        $cart = TheCart::where('user_id', $user->id)->where('status', 'pending')->first();
        $this->total_cart_items = $cart->products->count();
        
    }

    public function mount()
    {
    

        $user = auth()->user();
        $cart = TheCart::where('user_id', $user->id)->where('status', 'pending')->first();
        if($cart != null){
            $this->total_cart_items = $cart->products->count();
        }
        else{
            $this->total_cart_items = 0;
        }

    }

   


     public function refreshParent()
    {
        $this->upDateIcon();
    }

   


    public function render()
    {
        return view('livewire.cart-icon');
    }
}
