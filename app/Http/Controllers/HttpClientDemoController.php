<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpClientDemoController extends Controller
{
    //
    function get_data(){
        $data = Http::get("https://reqres.in/api/users?page=1");

        return view("httpclientdemo",["data"=>$data["data"]]);
    }
}
