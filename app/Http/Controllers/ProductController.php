<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    // Product::paginate(10);
    $products = Product::all();
    $categories = Category::all();
    return view('products.index',['products' => $products, 'categories' => $categories]);
  }

  public function shoppingCart()
  {
    // Product::paginate(1);
    $products = Product::all();
    return view('shoppingCart',['products' => $products]);
  }
}
