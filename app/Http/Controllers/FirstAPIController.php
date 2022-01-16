<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstAPIController extends Controller
{
    function index(Request $req){
        $data = ["name"=>"Ravi Patel","email"=>"ravi@test.com"];
        return $data;
    }
}
