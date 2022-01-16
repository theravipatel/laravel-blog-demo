<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersApiController extends Controller
{
    function get_user_data(Request $req){
        $data = array();
        $res    = array();
        $user_data = User::all();
        if(count($user_data)>0){
            $res["result"]  = "1";
            $res["data"]    = $user_data;
        }else{
            $res["result"]  = "0";
            $res["data"]    = array();
        }
        return $res;
    }
}
