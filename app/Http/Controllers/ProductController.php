<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;
use App\Cart;



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




  public function deleteAllProducts()
  {
      request()->session()->forget('cart');

      return redirect('/');
  }



}
