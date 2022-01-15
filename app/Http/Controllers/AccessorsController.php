<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class AccessorsController extends Controller
{
    function index(Request $req){
        return view("accessors",["data"=>Company::all()]);
    }
}
