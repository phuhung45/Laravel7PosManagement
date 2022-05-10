<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'supplier';
    protected $fillable = ['supplier_name', 'address', 'phone', 'email'];
}
