<?php

use App\Http\Controllers\APIResourceController;
use App\Http\Controllers\FirstAPIController;
use App\Http\Controllers\UsersApiController;
use App\Http\Controllers\UsersParamApiController;
use App\Http\Controllers\UsersPostPutDeleteSearchApiController;
use App\Http\Controllers\ValidationApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("first_api_data",[FirstAPIController::class,"index"]);

Route::get("get_user_data",[UsersApiController::class,"get_user_data"]);

Route::get("get_user_data_with_param/{key:username?}",[UsersParamApiController::class,"get_user_data"]);

Route::post("save_user_data",[UsersPostPutDeleteSearchApiController::class,"save_user_data"]);
Route::put("update_user_data",[UsersPostPutDeleteSearchApiController::class,"update_user_data"]);
Route::delete("delete_user_data/{id}",[UsersPostPutDeleteSearchApiController::class,"delete_user_data"]);
Route::get("search_user_data/{keyword}",[UsersPostPutDeleteSearchApiController::class,"search_user_data"]);

Route::post("validate_api",[ValidationApiController::class,"validate_api"]);

Route::apiResource("category",APIResourceController::class);
