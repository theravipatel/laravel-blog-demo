<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    function file_upload_process(Request $req){
        $data = $req->file("photo")->store("user_image");
        $req->session()->flash("msg",$req->photo->hashName());
        return redirect("file_upload_and_flash");
    }
}
