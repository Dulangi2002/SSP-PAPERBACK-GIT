<?php

namespace App\Http\Livewire;

use App\Models\product; // Ensure the correct model name is used
use Livewire\Component;

class Stocks extends Component
{
    public $stocklevels = [];

    public function getStocklevels()
    {
        $products = product::all();
        $stockLevels = [];

        foreach ($products as $product) {
            $stockLevels[] = [
                'id' => $product->id,
                'name' => $product->name,
                'stock' => $product->stock,
            ];
        }
    
        return $stockLevels;

    }

    public function render()
    {
        $this->stocklevels = $this->getStocklevels();

        return view('livewire.stocks', [
            'data' => $this->stocklevels,
        ]);
    }
}
