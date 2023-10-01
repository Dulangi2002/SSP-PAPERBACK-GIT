<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Cart;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use App\Jobs\ProductHits;


class ProductController extends Controller
{

    public $categories;

     
    public function index(){
        
        $data = product::all();
       //return $data;
         return view('productlist', compact('data')); 
    }


 


    public function details($id){
   
        $data = Product::find($id);
        if($data){
            ProductHits::dispatch($data->name, $data->id, 'increment');
            return view('productdescription',['product'=>$data]);

        } else {
            abort(404);
        }
      

    }

    public function createProduct(){

        $categories = [];
        $categories = Category::all();
        return view('createproduct' , compact('categories'));

    }

    public function SaveProduct(Request $request){

        $request ->validate([
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'category' => 'required',
            'stock' => 'required',   
            'price' => 'required',
            'image'=> 'required',      
        ]);
         
        $product = new Product();
        $product->name = $request->name;
        $product->author = $request->author;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->stock = $request->stock;
        $product->price = $request->price;
      
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/images', $imageName);
            $product->image = $imageName;
        }
        //$image = $request->file('image')->getClientOriginalName();
        //$request->image->move(public_path('img'),$image);
         
        
        $product->save();
        return redirect('product-list')->with('success','product added successfully');
        
 

    }

    public function backProductlist(){
        return redirect('product-list');
    }


    public function editProduct($id){
        $data = Product::where('id','=',$id)->first();
        return view('products.editproduct',compact('data')); 

    }


    public function updateProduct(Request $request){
        $request ->validate([
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);


        $id= $request->id;
        $name = $request->name;
        $author = $request->author;
        $description = $request->description;
        $category = $request->category;    
        $stock = $request->stock;
        $price = $request->price;
        $image = $request->file('image');

        $product = Product::find($id);
        if($product){
            $product->name = $name;
            $product->author = $author;
            $product->description = $description;
            $product->category = $category;
            $product->stock = $stock;
            $product->price = $price;
            if($image){
                if($product->image != null){
                    Storage::delete('public/images/'.$product->image);
                }
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('public/images', $imageName);
                $product->image = $imageName;
            }

        }

        $product->save();

        return redirect('product-list')->with('success','product updated successfully');

    }

    public function deleteProduct($id){
        $product = Product::find($id);

        if($product){
            if($product->image)
            Storage::delete('public/images/'.$product->image);
        }

        $product->delete();

        return redirect('product-list')->with('success','product deleted successfully');


    }

    public function back(){
        return view('adminhome');
    }
}
