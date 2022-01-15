<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeopleController extends Controller
{
    //
    function show_people($name){
        return view("people",["name"=>$name]);
    }
}
