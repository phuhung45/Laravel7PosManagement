<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart extends Model
{
    //
    protected $table = "carts";
    protected $fillable = ['product_id', 'product_qty', 'product_price', 'user_id', 'product_name'];

    public function product(){
        return $this->belongsTo('App\Product', 'product_id' , 'id');
    }
}
