<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\orders;
use App\Models\product;
use Livewire\Component;

class SalesPerCategory extends Component
{
    public $orderData;

    public $orders ;

    public $products ;

    public $categories ;


    public $salesPerCategory ;

    public function mount()
    {
        $this -> categories = Category::all();

    }  



    public function  functionCalculateCategorySales()
    {
        $this->orderData = orders::whereMonth('created_at', date('m'))->get();

        $salesPerCategory = $this->orderData->flatMap(function ($order) {
            return $order->products->groupBy('category')->map(function ($products) {
                return $products->sum('price');
            });
        });

        foreach( $salesPerCategory as $category_name => $sales)
        {
            $salesPerCategory[$category_name] = $sales;
        }
        
        //dd($salesPerCategory);
        $this -> salesPerCategory = $salesPerCategory;
        
        

    }



    public function render()
    {
        return view('livewire.sales-per-category',
        [
            'salesPerCategory' => $this->functionCalculateCategorySales(),
        ]);
        
    }
}
