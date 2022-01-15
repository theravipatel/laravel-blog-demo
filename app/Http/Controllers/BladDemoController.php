<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladDemoController extends Controller
{
    //
    function show_demo(){
        $ifdata = array("name"=>"Ravi");
        $foreachdata = array("John","Jane","Sam");
        return view("bladedemo",["ifdata"=>$ifdata,"foreachdata"=>$foreachdata]);
    }
}
