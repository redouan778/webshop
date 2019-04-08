<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webshopController extends Controller
{
  public function index(){
    $text = 'test matherfackerrrrrr';

    return view('index',[
      'txt' => $text
    ]);
  }
}
