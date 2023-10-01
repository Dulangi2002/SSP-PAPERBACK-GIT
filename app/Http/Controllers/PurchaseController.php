<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Requests\ValidateContactDetails;
use App\Models\customer_details;
use App\Models\orders;
use App\Models\product;
use App\Models\TheCart;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public $showPopUp = false;
    public $ContactNumber;
    public $houseNumber;
    public $streetAddress;
    public $city;

    public $product_id;
    public $quantity;
    public $product_price;
    public $total_price_per_product;

    public $user;

    public $orders;

    public bool $checked = false ;




    public function openPopUp()
    {
        $this->showPopUp = true;
    }
    public function getContactForm()
    {

        /*if (!auth()->user()) {
            return redirect()->route('login');
        }
        $this->user = auth()->user();
        $data = customer_details::where('user_id', $this->user->id)->first();*/
       return view('purchase.ContactForm' /*, compact('data')*/);
    }
/*
    public function addcontactDetails(ValidateContactDetails $request)
    {

        if (!auth()->user()) {
            return redirect()->route('login');
        }
        $this->user = auth()->user();

        $cart = TheCart::where('user_id', $this->user->id)->where('status', 'pending')->first();
        $validated = $request->validated();

        $this->ContactNumber = $validated['ContactNumber'];
        $this->houseNumber = $validated['houseNumber'];
        $this->streetAddress = $validated['streetAddress'];
        $this->city = $validated['city'];

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
            $productsData[$product->id] = ['product_price' => $product->price, 'quantity' => $product->pivot->quantity, 'total_price_per_product' => $product->pivot->total_price_per_product];

            $order->products()->attach($productsData);
        }

        $cart->status = 'completed';
        $cart -> products() -> detach();
        $cart->save();
        return redirect()->route('getSuccessPage');
    }*/


    public function success(){
        return view('purchase.success');
    }

    public function purchasehistory(){
        $orders = orders::where('user_id', auth()->user()->id)->get();
        return view('purchase.purchasehistory', compact('orders') );
    }


    public function permanentlySaveDetails(ValidateContactDetails $request){
        $this->checked = true;
        if (!auth()->user()) {
            return redirect()->route('login');
        }
        $this->user = auth()->user();
        
        $check = customer_details::where('user_id', $this->user->id)->first();
        $validated = $request->validated();

        $this->ContactNumber = $validated['ContactNumber'];
        $this->houseNumber = $validated['houseNumber'];
        $this->streetAddress = $validated['streetAddress'];
        $this->city = $validated['city'];


        if($check){
            customer_details::where('user_id',$this->user->id)->update([
                'ContactNumber' => $this->ContactNumber,
                'houseNumber' => $this->houseNumber,
                'streetAddress' => $this->streetAddress,
                'city' => $this->city,
            ]);
        }
        else{
            customer_details::create([
                'user_id' => $this->user->id,
                'ContactNumber' => $this->ContactNumber,
                'houseNumber' => $this->houseNumber,
                'streetAddress' => $this->streetAddress,
                'city' => $this->city,
            ]);
        }

    }


    

}
