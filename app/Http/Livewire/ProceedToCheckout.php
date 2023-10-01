<?php

namespace App\Http\Livewire;

use App\Http\Requests\ValidateContactDetails;
use App\Models\orders;
use App\Models\TheCart;
use Aoo\Models\product;
use App\Models\customer_details;
use App\Notifications\OrderSuccessful;
use Livewire\Component;


class ProceedToCheckout extends Component
{

    public $user_id;
    public $cart;

    public $ContactNumber;
    public $houseNumber;
    public $streetAddress;
    public $city;

    public $user;

    public $total_price;


    public function mount() {

        $user = auth()->user();
        $this->user_id = $user->id;
        $customerDetails =  customer_details::where('user_id', $this->user_id)->first();
        if($customerDetails) {
            $this->ContactNumber = $customerDetails->ContactNumber;
            $this->houseNumber = $customerDetails->houseNumber;
            $this->streetAddress = $customerDetails->streetAddress;
            $this->city = $customerDetails->city;
        }   
      
    }
    public function addcontactDetails()
    {
        if (!auth()->user()) {
            return redirect()->route('login');
        }
        $this->user = auth()->user();

        $cart = TheCart::where('user_id', $this->user->id)->where('status', 'pending')->first();
        
        orders::where('user_id', $this->user->id)->create([
            'user_id' => $this->user->id,
            'the_carts_id' => $cart->id,
            'ContactNumber' => $this->ContactNumber,
            'houseNumber' => $this->houseNumber,
            'streetAddress' => $this->streetAddress,
            'city' => $this->city,
            'total_price' => $cart->total_price,

        ]);

        $this->purchase();
    }

    public function purchase()
    {

        $this->user = auth()->user();
        $cart = TheCart::where('user_id', $this->user->id)->where('status', 'pending')->first();

        $cart->products->each(function ($product) {
            $product->stock -= $product->pivot->quantity;
            $product->save();
        });

        $order = orders::where('user_id', $this->user->id)->where('the_carts_id', $cart->id)->first();
        $productsData = [];

        // Loop through the cart's products and build an array with product_id and price.
        foreach ($cart->products as $product) {
            $productsData[$product->id] = [
                'product_price' => $product->price, 
                'quantity' => $product->pivot->quantity, 
                'total_price_per_product' => $product->pivot->total_price_per_product,
                //'total_price' => $cart->total_price 
            ];

            $order->products()->attach($productsData);
        }

        $cart->status = 'completed';
        $cart -> products() -> detach();
        $cart->save();
        auth()->user()->notify(new OrderSuccessful($order));

        return redirect()->route('getSuccessPage');

    }

   
    public function render()
    {
        return view('livewire.proceed-to-checkout');
    }
}
