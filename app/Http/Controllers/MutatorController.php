<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class MutatorController extends Controller
{
    function index(Request $req){
        $company = new Company;
        $company->name = "Reliance";
        $company->address = "Mumbai";
        $company->email = "ril@gmail.com";
        $company->save();
    }
}
