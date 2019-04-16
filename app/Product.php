<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';

  protected $fillable = ['product_name',  'product_price', 'product_description'];

  protected $primaryKey = 'product_id';
}
