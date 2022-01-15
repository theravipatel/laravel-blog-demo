<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuertBuilderController extends Controller
{
    //
    function get_data(){
        //$data = DB::table("users")->get();
        //$data = DB::table("users")->count();
        //$data = (array)DB::table("users")->find(1); // type casting
        
        /*
        DB::table('users')
        ->insert([
            "username"=>"jasonroy",
            "password"=>md5("jasonroy"),
            "first_name"=>"Jason",
            "last_name"=>"Roy",
            "email"=>"jason@test.com",
        ]);
        */

        /*
        DB::table('users')
        ->where("id",13)
        ->update([
            "username"=>"joeroot",
            "password"=>md5("joeroot"),
            "first_name"=>"Jeo",
            "last_name"=>"Root",
            "email"=>"joe@test.com",
        ]);
        */
        /*
        DB::table('users')
        ->where("id",13)
        ->delete();
        */
        $data = DB::table("users")->get();
        return view("query_builder",["data"=>$data]);
    }
}
