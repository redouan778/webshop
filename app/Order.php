<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = "orders";


    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
