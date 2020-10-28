<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/catalog{pageNumber}', 'HomeController@nextPage')->name('catalog');
Route::get('/order', 'HomeController@order')->name('order');
Route::get('/success', 'HomeController@orderSuccess')->name('orderSuccess');
Route::get('/catalog/{slug}', 'ProductController@store')->name('store-product');

Route::post('/addproduct', 'ProductController@addProductToList')->name('add-product-to-list');
Route::post('/cart/submitProducts', 'ProductController@confirmProducts')->name('submit-products');
Route::post('/submitOrder', 'OrderController@store')->name('submit-order');

Route::post('/product/updateQTI', 'HomeController@updateQTI')->name('update.qti');

Route::get('ebalnahui', 'HomeController@ebalnahui');
