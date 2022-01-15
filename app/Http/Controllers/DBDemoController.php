<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBDemoController extends Controller
{
    //
    function get_data(){
        return DB::select("select * from users");
    }
}
