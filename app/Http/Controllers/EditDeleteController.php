<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EditDeleteController extends Controller
{
    //
    function show_data(){
        return view("data_edit",["users"=>User::all()]);
    }
    function edit_data(Request $req){
        return view("data_edit",["edit_data"=>User::find($req->id)]);
    }
    function edit_process(Request $req){
        $data = User::find($req->id);
        $data->first_name = $req->first_name;
        $data->last_name = $req->last_name;
        $data->email = $req->email;
        $data->save();
        return redirect("data_edit");
    }
    function delete_process(Request $req){
        $data = User::find($req->id);
        $data->delete();
        return redirect("data_edit");
    }
}
