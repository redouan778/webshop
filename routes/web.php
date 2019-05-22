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

Route::get('/', 'ProductController@index');

Auth::routes();
Route::get('/homepage', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');
Route::resource('categories', 'CategoryController');

Route::get('/category/{id}', 'CategoryController@show')->name('category');

Route::get('/shoppingCart/{id}', 'ProductController@AddToShoppingCart')->name('AddToShoppingCart');

Route::get('/getCart', 'ProductController@getCart')->name('getCart');

Route::get('/deleteAllProducts', 'ProductController@deleteAllProducts')->name('deleteAllProducts');

Route::get('/deleteOneProduct/{id}', 'CartController@removeFromCart')->name('deleteOneProduct');
