<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Order;
use App\Product;
use App\User;


class OrderController extends Controller
{
    public function checkout()
    {
        $products = session('cart');

        $order = new Order;
        $order->user_id = Auth::id();
        $order->save();
//        dd($order->id);

        foreach ($products as $product) {
            $order->products()->attach($product['id'], ['amount' => $product['quantity']]);
        }

        session()->forget('cart');

        return view('checkout', compact('orders'));
    }
}
