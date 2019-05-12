<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['name', 'description', 'price', 'shopping_cart'];

  protected $table = 'products';

  protected $primaryKey = 'id';

  public function categories()
  {
    return $this->belongsToMany('App\Category');
  }
}
