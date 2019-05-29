<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTable;
use App\Product;


class UserController extends Controller
{
    public function index(){
        $AllUsers = UserTable::all();
        $products = Product::all();

        return view('products.index',compact('AllUsers' , 'products'));
    }
}
