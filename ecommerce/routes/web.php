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
    return view('welcome');
});


// Route::get('/home', function(){
//     return "Hello From Home page";
// });


// Route::get('/edit/{id}', function($id){
//     return "Id to be written ".$id;
// });


// Route::get('/ediatble/{id}/{name}', function($id,$name){
//     return "Id : ".$id." Name : ".$name;
// });

Route::get('/home',function(){
    return view('home');
});

// Without parameter
Route::get('/home', 'ProductController@home');


// With parameter
Route::get('/home/{id}/{name}', 'ProductController@home_argument');

// Calling via controller
Route::get('welcome', 'ProductController@test');

Route::get('/base',function(){
    return view('base');
});

Route::get('/product',function(){
    return view('product');
});

Route::get('/cart',function(){
    return view('cart');
});

Route::get('/contact',function(){
    return view('contact');
});

