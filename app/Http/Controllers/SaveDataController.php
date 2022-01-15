<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SaveDataController extends Controller
{
    //
    function save_data_process(Request $req){
        $user = new User;
        $user->username  = $req->username;
        $user->first_name   = $req->first_name;
        $user->last_name    = $req->last_name;
        $user->email        = $req->email;
        $user->password     = md5($req->password);

        $user->save();

        $req->session()->flash("msg","Data Saved Successfully.");

        return redirect("savedata");
    }
}
