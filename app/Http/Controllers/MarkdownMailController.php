<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;

class MarkdownMailController extends Controller
{
    function index(Request $req){
        return new TestMail();
    }
}
