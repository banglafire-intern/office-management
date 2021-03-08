<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Policies;
use App\Leaves;

class PoliciesController extends Controller
{
    public function getAll() {
        $policies = new Policies;
        $results = $policies::all();
        // echo $results;
        // $results_json = json_encode($results);
        $results_json = $results;
        return response()
                ->json($results_json)
                ->header('Content-Type', 'application/json');
    }
    public function getAllLeaves($id) {
        if($id == null) {
            return "please pass parameter id in the request";
        }
        $leaves = new Leaves;
        $results = $leaves::where('policy_id', $id)->get();
        // var_dump($results);
        // foreach($results as $result) {
        //     echo $result;
        // }
        // $results_json = json_encode($results);
        $results_json=$results;
        return response()
                ->json($results_json)
                ->header('Content-Type', 'application/json');
    }
    public function updateOne($id, Request $request) {
        if($id == null) {
            return "please pass parameter id in the request";
        }
        $policies = new Policies;
        $policy = $policies::find($id);
        if($policy) {
            $policy -> name = $request->input('name');
            $policy -> save();
            return response()->json([
                'id' => $policy->policy_id,
                'name' => $policy->name
            ]);
        } else {
            return response('policy id not found', 404);
        }
    }
    public function createOne(Request $request) {
        $name = $request->input('name');
        $policies = new Policies;
        $policies->name = $name;
        $policies->save();
        return response()->json([
            'name' => $policies->name
        ]);
    }
    public function deleteOne($id, Request $request) {
        if($id == null) {
            return "please pass parameter id in the request";
        }
        $policies = new Policies;
        $policy = $policies::find($id);
        if($policy) {
            $policy->delete();
            return response()->json([
            'id' => $id,
            ]);
        } else {
            return response('policy id not found', 404);
        }
    }
}
