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
Route::post("/policies", "PoliciesController@createOne");
Route::put("/policies/{id}", "PoliciesController@updateOne");
Route::delete("/policies/{id}", "PoliciesController@deleteOne");

// Route::get("/policies", function(Request $request) {
//     $policies = App\Policies::all();
//     foreach($policies as $policy) {
//         echo $policy;
//     }
//     return;
// });

// Route::post("/policies", function(Request $request) {
//     // return "hi";
//     // $policies = App\Policies::all();
//     // foreach($policies as $policy) {
//     //     echo $policy;
//     // }
//     $name = $request->input('name');
//     $policies = new Policies;
//     $policies->name = $name;
//     $policies->save();
//     return response()->json([
//        'name' => $policies->name
//     ]);
// });

// Route::put("/policies/{id}", function(Request $request, $id) {
//     if($id == null) {
//         return "please pass parameter id in the request";
//     }
//     $policies = new Policies;
//     $policy = $policies::find($id);
//     $policy -> name = $request->input('name');
//     $policy -> save();
//     return response()->json([
//        'id' => $policy->policy_id,
//        'name' => $policy->name
//     ]);
// });

// Route::delete("/policies/{id}", function(Request $request, $id) {
//     if($id == null) {
//         return "please pass parameter id in the request";
//     }
//     $policies = new Policies;
//     $policy = $policies::find($id);
//     $policy->delete();
//     return response()->json([
//        'id' => $id,
//     ]);
// });
