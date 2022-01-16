<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersParamApiController extends Controller
{
    function get_user_data(User $key=null){
        $res    = array();
        $user_data = ($key!==null)?User::find($key):User::all();
        //$user_data = User::where('username',$key)->get();
        if(!empty($user_data)){
            $res["result"]  = "1";
            $res["data"]    = $user_data;
        }else{
            $res["result"]  = "0";
            $res["data"]    = array();
        }
        return $res;
    }
}
