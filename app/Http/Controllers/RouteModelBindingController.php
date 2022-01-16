<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RouteModelBindingController extends Controller
{
    function index(User $key){
        $data = $key;
        return view("route_model_binding",["users"=>$data]);
    }
}
