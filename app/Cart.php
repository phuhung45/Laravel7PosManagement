<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart extends Model
{
    //
    protected $table = "carts";
    protected $fillable = ['product_id', 'product_qty', 'product_price', 'user_id'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
