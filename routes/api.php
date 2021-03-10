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

//TODO:
// attendence sheet should contain a save button for each user component 
// so that only one user attendance update shouldn't require updateing all the rows of 
// the databse
// Route::get("/attendances/{year}/{month}/{day}/{user_id}") -> get one user information 
// Route::post("/attendances/{year}/{month}/{day}/{user_id}") -> post one user information 
// Route::put("/attendances/{year}/{month}/{day}/{user_id}") -> update one user information 
// Route::get("/attendances/${date}", "");
Route::post("/attendances", "AttendancesController@createOne");
Route::put("/attendances", "AttendancesController@updateOne");
// Route::get("/attendances/${date}/${user_id}", "");

Route::get("/reasons", "ReasonController@getAll");
Route::post("/reasons", "ReasonController@createOne");
Route::put("/reasons/{id?}", "ReasonController@updateOne");
Route::delete("/reasons/{id?}", "ReasonController@deleteOne");


Route::get("/remainings/{user_id?}/{leave_id?}", "RemainingsController@getOne");
Route::post("/remainings/{user_id?}/{leave_id?}", "RemainingsController@createOne");
Route::put("/remainings/{user_id?}/{leave_id?}", "RemainingsController@updateOne");
// Route::posts("/remainings/{id}", "");
// Route::put("/remainings/{id}", "");

Route::post("/leave-requests", "LeaveRequestController@createOne");
Route::get("/leave-requests", "LeaveRequestController@fetchAll");
Route::get("/leave-requests/{user_id?}", "LeaveRequestController@fetchForOneUser");
Route::put("/leave-requests/{request_id?}", "LeaveRequestController@editOneRequest");