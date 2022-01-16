<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(Request $req){
        //return view("onetoonerelation",["product_data"=>Product::all()->categoryData]);
        return Product::find(1);
    }
}
