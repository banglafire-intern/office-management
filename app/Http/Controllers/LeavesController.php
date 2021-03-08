<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leaves;

class LeavesController extends Controller
{
    public function findOne($id) {
        if($id == null) {
            return "please pass parameter id in the request";
        }
        $leaves = new Leaves;
        $leave = $leaves::find($id);
        if($leave) {
            return response()
                    ->json($leave)
                    ->header('Content-Type', 'application/json');
        } else {
            return response("leave id not found", 404);
        }
    }
    public function createOne(Request $request) {
        $leaves = new Leaves;
        $data =  $request->validate([
            'name' => 'required',
            'type' => 'required',
            'days' => 'required',
            'policy_id' => 'required'
        ]);
        $leaves->name = $data['name'];
        $leaves->type= $data['type'];
        $leaves->days = $data['days'];
        $leaves->policy_id=$data['policy_id'];
        $leaves->save();
        return $leaves->getOriginal();
    }
    public function deleteOne($id) {
        if($id == null) {
            return "please pass parameter id in the request";
        }
        $leaves = new Leaves;
        $leave = $leaves::find($id);
        if($leave) {
            $leave->delete();
            return response()->json([
                'id' => $id
            ]);
        } else {
            return response("leave id not found", 404);
        }
    }
    public function updateOne(Request $request, $id) {
        if($id == null) {
            return "please pass parameter id in the request";
        }
        $data =  $request->validate([
            'name' => 'required',
            'type' => 'required',
            'days' => 'required',
            'policy_id' => 'required'
        ]);
        $leaves = new Leaves;
        $leave = $leaves::find($id);
        if($leave) {
            $leave->name = $data['name'];
            $leave->type = $data['type'];
            $leave->days = $data['days'];
            $leave->policy_id = $data['policy_id'];
            $leave->save();
            return $leave->getOriginal();
        } else {
            return response("leave id not found", 404);
        }
    }
}
