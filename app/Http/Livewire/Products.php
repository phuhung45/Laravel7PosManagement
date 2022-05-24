<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;

class Products extends Component
{
    public $products_details = [];
    public function count(){

    }

    public function ProductsDetails($product_id){
          $this->products_details = Product::where('id', $product_id)->get();
    //    dd($count);
    }

    public function render()
    {
        return view('livewire.products', ['products'=> Product::all()]);
    }
}
