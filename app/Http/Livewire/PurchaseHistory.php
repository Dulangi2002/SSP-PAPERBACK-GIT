<?php

namespace App\Http\Livewire;

use App\Models\orders;
use Livewire\Component;

class PurchaseHistory extends Component
{


    public $orders ;
    public $allProducts = [];


    public $quantity;
    public $product_price;
    public $total_price_per_product;
    public $name;

    public $image;




    protected $listeners = ['refreshPage' => 'mount'];


    public function mount()

    {


        $user = auth()->user();
        $orders = orders::where('user_id', $user->id)->get();
        $this->orders = $orders;
        //dd($orderswithproducts->toArray());
        $allProducts = [];
        //fetch products from the orders
        foreach ($orders as $order) {
            $products = orders::with('products')->get()->toArray();

           // $products = $order->productss->toArray();
            
            $allProducts = array_merge($allProducts, $products);
            //dd($allProducts);
             
        }
        $this->allProducts = $allProducts;
    }   

   



    public function render()
    {
        return view('livewire.purchase-history');
    }
}
