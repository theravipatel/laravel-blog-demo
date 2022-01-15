<?php

use App\Http\Controllers\AccessorsController;
use App\Http\Controllers\AggregrateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\BladDemoController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyUsersController;
use App\Http\Controllers\DataListPagingController;
use App\Http\Controllers\DBDemoController;
use App\Http\Controllers\EditDeleteController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FormDemoController;
use App\Http\Controllers\HttpClientDemoController;
use App\Http\Controllers\HttpReqController;
use App\Http\Controllers\JoinDemoController;
use App\Http\Controllers\MutatorController;
use App\Http\Controllers\QuertBuilderController;
use App\Http\Controllers\SaveDataController;
use App\Http\Controllers\SessionLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("users",[UserController::class,"show"]);
Route::get("user/{name}",[UserController::class,"show_user"]);
Route::view("customer","customer");
Route::get("employee/{name}",function($name){
    return view("employee",["name"=>$name]);
});
Route::get("people/{name}",[PeopleController::class,"show_people"]);
Route::get("bladedemo",[BladDemoController::class,"show_demo"]);

Route::post("formsubmit",[FormDemoController::class,"postData"]);
Route::view("formdemo","formdemo");

Route::view("noaccess","noaccess");

Route::group(['middleware'=>['verifiedPage']],function(){
    Route::view("verifiedpage","verifiedpage");
});

Route::view("routedmw","routedmw")->middleware("memberPage");

Route::get("dbdemo",[DBDemoController::class,"get_data"]);

Route::get("companyusers",[CompanyUsersController::class,"get_data"]);
Route::get("company",[CompanyController::class,"get_data"]);

Route::get("httpclientdemo",[HttpClientDemoController::class,"get_data"]);

Route::view("httpreqmethod","httpreqmethod");
Route::get("httpreq_process",[HttpReqController::class,"httpget"]);
Route::post("httpreq_process",[HttpReqController::class,"httppost"]);
Route::put("httpreq_process",[HttpReqController::class,"httpput"]);
Route::delete("httpreq_process",[HttpReqController::class,"httpdelete"]);

Route::post("session_login_process",[SessionLoginController::class,"login"]);
Route::view("session_profile","session_profile")->middleware("SessionCheck");
Route::get("session_logout",function(){
    if(session()->has("USER_NAME")){
        session()->pull("USER_NAME",null);
    }
    return redirect("session_login");
});

Route::get("session_login",function(){
    if(session()->has("USER_NAME")){
        return redirect("session_profile");
    }
    return view("session_login");
});

Route::view("file_upload_and_flash","file_upload_and_flash");
Route::post("file_upload_process",[FileUploadController::class,"file_upload_process"]);

//Route::view("localization","localization");
Route::get("localization/{lang}",function($lang){
    App::setlocale($lang);
    return view("localization");
});

Route::view("savedata","savedata");
Route::post("save_data_process",[SaveDataController::class,"save_data_process"]);

Route::get("datalist_pagination",[DataListPagingController::class,"show_list"]);

Route::get("data_edit",[EditDeleteController::class,"show_data"]);
Route::get("/edit/{id}",[EditDeleteController::class,"edit_data"]);
Route::post("edit_process",[EditDeleteController::class,"edit_process"]);
Route::get("/delete/{id}",[EditDeleteController::class,"delete_process"]);

Route::get("query_builder",[QuertBuilderController::class,"get_data"]);

Route::get("aggregate_method",[AggregrateController::class,"get_data"]);

Route::get("joindemo",[JoinDemoController::class,"get_data"]);

Route::get("accessors",[AccessorsController::class,"index"]);

Route::get("mutatordemo",[MutatorController::class,"index"]);