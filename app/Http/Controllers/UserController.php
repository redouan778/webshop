<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    public function index(){
        $AllUsers = User::all();

        redirect('/', compact('AllUsers'));
    }
}
