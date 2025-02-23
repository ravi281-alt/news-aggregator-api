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

Route::get('/', function () {
    return view('index');
});

Route::get('/product_detail', function () {
    return view('product_detail');
});

Route::get('/place-order', function () {
    return view('place-order');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route::get('/addProduct', function () {
//     return view('register');
// });

Route::get('/sign-in', function () {
    return view('signin');
});

Route::get('/cart', function () {
    return view('cart');
});

// Route::get('/products', function(){
//     return view('addproducts');
// });
Route::post('/addproduct', 'ProductController@addproduct');
Route::get('/products', 'ProductController@addproduct');
Route::get('/delete/{rid}','ProductController@deleteproduct');
Route::get('/edit/{rid}','ProductController@editproduct');



// Route::get('')
