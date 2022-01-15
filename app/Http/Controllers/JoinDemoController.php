<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoinDemoController extends Controller
{
    function get_data(){
        $data = DB::table('users')
        ->join("company","users.company_id","=","company.id")
        ->select(DB::raw("users.*,company.name AS company_name"))
        ->get();
        return view("joindemo",["users"=>$data]);
    }
}
