<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['name', 'phone'];

    public function order_details(){
        return $this->hasMany('App\Order_Detail');
    }

    public function tran(){
        return $this->belongsTo(Transaction::class,'order_id');
    }
}
