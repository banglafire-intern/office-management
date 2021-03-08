<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Policies;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/policies","PoliciesController@getAll");
Route::get("/policies/{id}", "PoliciesController@getAllLeaves");
Route::post("/policies", "PoliciesController@createOne");
Route::put("/policies/{id}", "PoliciesController@updateOne");
Route::delete("/policies/{id}", "PoliciesController@deleteOne");

Route::get("/leaves/{id}", "LeavesController@findOne");
Route::post("/leaves", "LeavesController@createOne");
Route::put("/leaves/{id}", "LeavesController@updateOne");
Route::delete("/leaves/{id}", "LeavesController@deleteOne");