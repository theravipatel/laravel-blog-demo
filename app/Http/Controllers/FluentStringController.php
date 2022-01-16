<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FluentStringController extends Controller
{
    function index(Request $req){
        $old_data = "hi, Laravel world!!!";

        $new_data = Str::of($old_data)
                    ->ucfirst($old_data)
                    ->replaceFirst("Hi","Hello",$old_data)
                    ->camel($old_data);

        return view("fluent_string",["old_data"=>$old_data,"new_data"=>$new_data]);
    }
}
