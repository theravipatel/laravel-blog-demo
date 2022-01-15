<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function show(){
        return "Hello World!";
    }

    function show_user($name){
        return "Hello ".$name;
    }
}
