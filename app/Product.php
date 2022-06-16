<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['product_name', 'price', 'alert_stock', 'quantity', 'brand', 'description', 'barcode', 'qrcode', 'product_image'];

    public function order_details(){
        return $this->hasMany('App\Order_Detail');
    }

    // public function cart(){
    //     return $this->hasMany('App\Cart');
    // }

    public function cart(){
        return $this->hasMany(Cart::class,'product_id','id');
    }
}
