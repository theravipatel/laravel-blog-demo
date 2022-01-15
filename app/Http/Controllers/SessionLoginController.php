<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionLoginController extends Controller
{
    //
    function login(Request $req){
        $data = $req->input();
        $req->session()->put("USER_NAME",$data["username"]);
        return redirect("session_profile");
    }
}
