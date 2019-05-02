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

  public function AddToShoppingCart(Request $request, product $product, $id)
  {

    $product = Product::find($id);


        if ($product->shopping_cart === 0) {
            $productToShoppingCart = $product->update([
                'shopping_cart' => $shoppingCart = 1
            ]);
            return redirect('homepage')->with('alert', 'Succesvol toegevoegd in je mandje!');

        } else {
            $productToShoppingCart = $product->update([
                'shopping_cart' => $shoppingCart = 0
            ]);
            return redirect('homepage');
        }

  }

  public function shoppingCart(){

    $orders = Product::where('shopping_cart', 1)->get();

    return view('shoppingCart',['orders' => $orders ]);
  }
}
