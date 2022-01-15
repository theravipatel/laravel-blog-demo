<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CompanyUsersController extends Controller
{
    //
    function get_data(){
        return User::all();
    }
}
