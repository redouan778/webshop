<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'ProductController@index');

Route::get('/homepage', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');

Route::resource('categories', 'CategoryController');

Route::get('/category/{id}', 'CategoryController@show')->name('category');

Route::get('/shoppingCart', 'CartController@index')->name('shoppingCart');

Route::get('/users', 'UserController@index')->name('users');

Route::get('/shoppingCart/{id}', 'CartController@AddToCart')->name('AddToShoppingCart');

Route::get('/deleteAllProducts', 'CartController@deleteAllProducts')->name('deleteAllProducts');

Route::get('/deleteOneProduct/{id}', 'CartController@removeFromCart')->name('deleteOneProduct');
