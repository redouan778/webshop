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

//Homepage
Route::get('/', 'ProductController@index');
Route::get('/homepage', 'HomeController@index')->name('home');

//Products resource
Route::resource('products', 'ProductController');

//Category resource
Route::resource('categories', 'CategoryController');

//Category routes
Route::get('/shoppingCart', 'CartController@index')->name('shoppingCart');
Route::get('/category/{id}', 'CategoryController@show')->name('category');

//CartController routes
Route::get('/shoppingCart/{id}', 'CartController@AddToCart')->name('AddToShoppingCart');
Route::get('/deleteOneProduct/{id}', 'CartController@removeFromCart')->name('deleteOneProduct');
Route::get('/deleteAllProducts', 'CartController@deleteAllProducts')->name('deleteAllProducts');
Route::get('/checkout', 'OrderController@checkout')->name('checkout')->middleware('auth');


//Admin controller
Route::get('/adminPanel', 'AdminController@index')->name('adminPanel')->middleware('admin');
Route::get('/allProducts', 'ProductController@show')->name('allProducts');



//Error controller
Route::get('/error', 'HomeController@error')->name('error');