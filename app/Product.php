<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['name', 'description', 'price', 'shopping_cart'];

  protected $table = 'Products';

  protected $primaryKey = 'id';

  public function Categories()
  {
    return $this->belongsToMany('App\Product');
  }
}
