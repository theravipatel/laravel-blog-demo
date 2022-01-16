<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    function index(Request $req){
        return view("onetoone_manyrelation",["product_data"=>Category::find(1)->productData]);
    }
}
