<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AggregrateController extends Controller
{
    //
    function get_data(){
        //return DB::table('users')->sum("id");
        //return DB::table('users')->min("id");
        //return DB::table('users')->max("id");
        //return DB::table('users')->avg("id");
        return DB::table('users')->select(DB::raw("min(id) as min_price, max(id) as max_price"))->get();
    }
}
