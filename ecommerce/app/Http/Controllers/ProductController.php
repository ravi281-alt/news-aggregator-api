<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function home(){
        // return "<h3>Hello from product controller of home function</h3>";
        // return view('home',['fruits'=>['Mango','banana','pineapple']]);
        // return view('home',['fruits'=>['Mango','banana','pineapple','grapes']]);
        $fruits = ['cherry','Mango','banana','pineapple','grapes'];
        // $fruits = ['cherry'];    
        return view('home',compact('fruits'));
        // return redirect('/');
    }

    function home_argument($id,$name){
        return "<h3>Id to be edited ".$id." And name is ".$name."</h3>";
    }


    function test(){
        return "Controller works in welcome .php";
    }
}
