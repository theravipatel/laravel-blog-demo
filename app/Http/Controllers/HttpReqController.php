<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HttpReqController extends Controller
{
    //
    function httpget(Request $req){
        return $req->input();
    }

    function httppost(Request $req){
        return $req->input();
    }

    function httpput(Request $req){
        return $req->input();
    }

    function httpdelete(Request $req){
        return $req->input();
    }
}
