<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ValidationApiController extends Controller
{
    function validate_api(Request $req){

        $res = 0;
        $msg = array("message"=>"Something went wrong. Please try again.");
        
        $rules = array(
            "name"=>"required"
        );
        $validator = validator()->make($req->all(),$rules);
        if($validator->fails()){
            $msg[] = $validator->errors();
            return response()->json($msg,401);
        }else{
            
            if(isset($req)){
                $category_data = new Category;
                $category_data->name        = $req->name;
                $result = $category_data->save();
                if($result){
                    $res = 1;
                    $msg = ["message"=>"Data saved successfully."];
                    return ["result"=>$res,"msg"=>$msg];
                }
            }
        }
    }
}
