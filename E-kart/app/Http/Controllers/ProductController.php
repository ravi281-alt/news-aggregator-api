<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function addproduct(Request $r){
        if($r->isMethod('post'))
        {
            $pname = $r->input('pname');
            $pdesc = $r->input('pdesc');
            $price = $r->input('price');
            $cat = $r->input('cat');
            $Status = $r->input('pactive');

            $p = new Product();
            $p->title = $pname;
            $p->description = $pdesc;
            $p->price = $price;
            $p->category = $cat;
            $p->status = $Status;
            $p->save();
            return redirect('/products');
        }
        else
        {
            //Display Products Details
            // $data = Product::all();
            $data = Product::paginate(6);
            return view('addproducts',compact('data'));
        }
    }

    function deleteproduct(Request $r, $rid){
        $p = Product::find($rid);
        $p->delete();
        return redirect('/products');
    }

    function editproduct(Request $r, $rid){
        echo "Welcome in edit page : ".$rid;
    }
}
