<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DataListPagingController extends Controller
{
    //
    function show_list(){
        //$users = new User;
        return view("datalist_pagination",["users"=>User::paginate(5)]);
    }
}
