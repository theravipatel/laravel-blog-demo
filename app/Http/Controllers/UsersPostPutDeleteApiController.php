<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersPostPutDeleteApiController extends Controller
{
    function save_user_data(Request $req){
        
        $res = 0;
        $msg = "Something went wrong. Please try again.";
        if(isset($req)){
            $user_data = new User;
            $user_data->company_id  = $req->company_id;
            $user_data->username    = $req->username;
            $user_data->first_name  = $req->first_name;
            $user_data->last_name   = $req->last_name;
            $user_data->email       = $req->email;
            $user_data->phone       = $req->phone;
            $user_data->city        = $req->city;
            $user_data->password    = md5($req->password);
            $result = $user_data->save();
            if($result){
                $res = 1;
                $msg = "Data saved successfully.";
            }
        }

        return ["result"=>$res,"msg"=>$msg];
    }

    function update_user_data(Request $req){
        $res = 0;
        $msg = "Something went wrong. Please try again.";
        if(isset($req)){
            $user_data = User::find($req->id);
            $user_data->company_id  = $req->company_id;
            $user_data->username    = $req->username;
            $user_data->first_name  = $req->first_name;
            $user_data->last_name   = $req->last_name;
            $user_data->email       = $req->email;
            $user_data->phone       = $req->phone;
            $user_data->city        = $req->city;
            $user_data->password    = md5($req->password);
            $result = $user_data->save();
            if($result){
                $res = 1;
                $msg = "Data udpated successfully.";
            }
        }

        return ["result"=>$res,"msg"=>$msg];
    }

    function delete_user_data($id){
        $res = 0;
        $msg = "Something went wrong. Please try again.";
        if(isset($id) && $id>0){
            $user_data = User::find($id);
            $result = $user_data->delete();
            if($result){
                $res = 1;
                $msg = "Data deleted successfully.";
            }
        }
        return ["result"=>$res,"msg"=>$msg];
    }

}
