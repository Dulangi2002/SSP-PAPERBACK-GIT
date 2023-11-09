<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use App\Models\TheCart;


class ViewCart extends Component

{
    public $user_id;

    public $productId;
    public $total_price;

    public $product_image;

    public $total_cart_items;


    public $products;

    
    


    public $product_price;
    public $total_price_per_item;
    public $cart;
    public $quantity;

  

    


    

    public function mount($user_id )
    {
         $this->user_id = $user_id;
         $this->cart = TheCart::where('user_id', $this->user_id)->where('status', 'pending')->first();
        // 
         if ( $this->cart )
         {

                $this->products = $this->cart->products;
                $this->total_price = $this->cart->products->sum('pivot.total_price_per_product');
                $this->total_cart_items = $this->cart->products->sum('pivot.quantity');
                $this->total_price_per_item = $this->cart->products->sum('pivot.total_price_per_product');
            } else {
                $this->total_price = 0;
                $this->total_cart_items = 0;
                $this->total_price_per_item = 0;
         }
       //  $this->total_price = $this->cart->products->sum('pivot.total_price_per_product');
        // $this->total_cart_items = $this->cart->products->sum('pivot.quantity');
        // $this->total_price_per_item = $this->cart->products->sum('pivot.total_price_per_product');
       
        
    }

    public function ViewCart()
    {
        if (auth()->user()) {
            $this->user_id = auth()->user()->id;
        } else {
            return redirect()->route('login');
        }

        

       
        
    }

    public function increment($productId)

    {  
        //if the stock is lower than the quantity of the item in the cart, then the user cannot add more items to the cart
        $this->productId = $productId;
        $quantity_of_item = $this->cart->products->find($productId)->pivot->quantity;
        $getStock = product::where('id', $productId)->value('stock');
        if ($quantity_of_item < $getStock) {
            $this->cart->products()->updateExistingPivot($productId, [
                'quantity' => $this->cart->products->find($productId)->pivot->quantity += 1,
                'total_price_per_product' => $this->cart->products->find($productId)->pivot->total_price_per_product += $this->cart->products->find($productId)->price
            ]);
        } else {
            $this->emit('productAddedToCart', 'Out of stock');
        }

        $this->cart-> update([
            'total_price' => $this->cart->products->sum('pivot.total_price_per_product'),
            'total_cart_items' => $this->cart->products->sum('pivot.quantity'),
            'total_price_per_item' => $this->cart->products->sum('pivot.total_price_per_product'),
            
        ]);
        $this->cart->save();

        
        $this->total_price = $this->cart->products->sum('pivot.total_price_per_product');
        
        $this->total_cart_items = $this->cart->products->sum('pivot.quantity');
        $this->total_price_per_item = $this->cart->products->sum('pivot.total_price_per_product');
        $this->products = $this->cart->products;

       
        
    }


    public function decrement($productId)
    {

        //if the quantity of the item in the cart is 1, then the user cannot decrease the quantity of the item in the cart
        $this->productId = $productId;
        $quantity_of_item = $this->cart->products->find($productId)->pivot->quantity;
        if ($quantity_of_item == 1) {
           $this -> delete($productId);
           $this->emit('productAddedToCart', 'Product deleted from cart.');

        }else{
            $this->cart->products()->updateExistingPivot($productId, [
                'quantity' => $this->cart->products->find($productId)->pivot->quantity -= 1,
                'total_price_per_product' => $this->cart->products->find($productId)->pivot->total_price_per_product -= $this->cart->products->find($productId)->price
            ]);
        }
        // $this->cart->products()->updateExistingPivot($productId, [
        //     'quantity' => $this->cart->products->find($productId)->pivot->quantity -= 1,
        //     'total_price_per_product' => $this->cart->products->find($productId)->pivot->total_price_per_product -= $this->cart->products->find($productId)->price
        // ]);

        $this->cart-> update([
            'total_price' => $this->cart->products->sum('pivot.total_price_per_product'),
            'total_cart_items' => $this->cart->products->sum('pivot.quantity'),
            'total_price_per_item' => $this->cart->products->sum('pivot.total_price_per_product'),
            
        ]);
        $this->cart->save();

        $this->total_price = $this->cart->products->sum('pivot.total_price_per_product');
        $this->total_cart_items = $this->cart->products->sum('pivot.quantity');
        $this->total_price_per_item = $this->cart->products->sum('pivot.total_price_per_product');
        $this->products = $this->cart->products;
    
    }


    public function delete($productId)
    {
        $this->cart->products()->detach($productId);
        $this->total_price = $this->cart->products->sum('pivot.total_price_per_product');
        $this->total_cart_items = $this->cart->products->sum('pivot.quantity');
        $this->total_price_per_item = $this->cart->products->sum('pivot.total_price_per_product');
        $this->products = $this->cart->products;
        
        // $this -> ViewCart( $this->user_id);
        // $this->emit('productAddedToCart', 'Product deleted from cart.');
        $this ->emit('productAddedToCart', 'Product deleted from cart.');
        $this -> mount($this->user_id);

    }
    
    
    
    public function render()
    {
        return view('livewire.view-cart');
    }
}
