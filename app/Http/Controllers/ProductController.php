<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    // Product::paginate(1);
    $products = Product::all();
    return view('products.index',['products' => $products]);
  }

  public function shoppingCart()
  {
    // Product::paginate(1);
    $products = Product::all();
    return view('shoppingCart',['products' => $products]);
  }
}
