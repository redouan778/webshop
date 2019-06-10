<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;

class OrderController extends Controller
{
    public function checkout()
    {

        $order = new \App\Order;
        $order->user_id = Auth::id();
        $order->save();

        session()->forget('cart');

        return view('checkout');
    }
}
