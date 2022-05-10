<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['name', 'phone'];

    public function order_details(){
        return $this->hasMany('App\Order_Detail');
    }
}
