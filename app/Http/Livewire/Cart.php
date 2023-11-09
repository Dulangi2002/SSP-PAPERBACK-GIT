<?php

namespace App\Http\Livewire;

use App\Models\product;
use App\Models\TheCart;
use App\Models\User;
use Illuminate\Contracts\Support\MessageBag;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class Cart extends Component

{


    public  $productId;

    public $quantity = 1;

    public $user_id;

    public $product_price;

    public $total_price_per_product;

    public $message; 

    public $total_price;

    public $total_cart_items;

    public $total_price_per_item;

    public $products;

  
    public function mount ($productId){
        $this->productId = $productId;
    }

   /*public function addToCart(){
    dd($this->productId);       
    }*/
   


    public function viewCartItems(){
        $cartitems = Cart::all();
        return view('livewire.cart',compact('cartitems'));
    } 



    public function addToCart(){

        if(auth()->user()){
            $this-> user_id = auth()->user()->id;
        }else{
            return redirect()->route('login');
        }
        //$cart = auth()->user()->theCart ;
        $cart = TheCart::where('user_id',auth()->user()->id)->where('status','pending')->first();
       
        if($cart){
            $check = $cart->products()->find($this->productId);
            $product = product::find($this->productId);
            $this->product_price = $product->price;
            $product_qauntity_in_stock = $product->stock;

            if($this->quantity > $product_qauntity_in_stock){
                $this->emit('productAddedToCart', 'Product is not in stock.');
                return;
            }
            if($check){
                $check -> pivot -> update ([
                     
                     'quantity' => $this -> quantity + $check -> pivot -> quantity,
                     'product_price' => $this -> product_price,
                     'total_price_per_product' => $this -> product_price *( $this -> quantity +$check -> pivot -> quantity ),

                ]);

                $cart->save();

                $cart->total_price = $cart->products->sum('pivot.total_price_per_product');
                $cart -> update([
                    'total_price' => $cart->total_price,
                ]);

                $cart->save();


                $this->emit('productAddedToCart', 'Product added to cart.');

                

                

            }else{
            

                 $cart -> products() -> attach($this->productId,[
                    'quantity' => $this -> quantity,
                    'product_price' => $this -> product_price,
                    'total_price_per_product' => $this -> product_price * $this -> quantity,
                 ]);

                 
                $cart->save();

                $cart->total_price = $cart->products->sum('pivot.total_price_per_product');
                $cart -> update([
                    'total_price' => $cart->total_price,
                ]);

                $cart->save();

                $this->emit('productAddedToCart', 'Product added to cart.');

            }
           
        }else{
            $cart = new TheCart();
            $cart->user_id = $this->user_id; 
            $cart->status = 'pending';
            $cart->total_price = 0;
            $cart->save();

            $product = product::find($this->productId);
            $this->product_price = $product->price;
            
            $cart -> products() -> attach($this->productId,[
               
                'quantity' => $this -> quantity,
                'product_price' => $this -> product_price,
                'total_price_per_product' => $this -> product_price * $this -> quantity,
             ]);

             $cart->save();

             $cart->total_price = $cart->products->sum('pivot.total_price_per_product');


                $cart -> update([
                    'total_price' => $cart->total_price,
             ]);


            $cart->save();

            $this->emit('productAddedToCart', 'Product added to cart.');
        }
    }


/*
    public function increment(){
        $this->quantity++;
        
    }
   
    public function decrement(){
        if($this->quantity > 1){
            $this->quantity--;
           
        }
    }

*/

public function increment($productId) {
    $product = Product::find($productId);

    if ($product) {
        $productQuantityInStock = $product->stock;
        if ($this->quantity < $productQuantityInStock) {
            $this->quantity++;
        } else {
            $this->emit('productAddedToCart', 'Product is not in stock.');
        }
    } 

    //check if the product is in any carts
    $cart = TheCart::where('user_id', auth()->user()->id)->where('status', 'pending')->first();
    if ($cart) {
        $check = $cart->products()->find($productId);
        if ($check) {
            $quantityInCart = $check->pivot->quantity;
            $productQuantityInStock = $productQuantityInStock - $quantityInCart;
            if ($this->quantity > $productQuantityInStock) {
                $this->emit('productAddedToCart', 'Product is not in stock.');
                $this->quantity = $productQuantityInStock;
            }
       
        }
    }

    else {
        $this->emit('productAddedToCart', 'Product not found.');
    }
}


    public function decrement(){
        if($this->quantity > 1){
            $this->quantity--;
           
        }
    }



    

 


    public function render()
    {
        return view('livewire.cart' );
    }
}
