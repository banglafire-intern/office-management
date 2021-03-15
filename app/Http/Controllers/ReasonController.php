<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reasons;

class ReasonController extends Controller
{
    function getAll() {
        $reasons = new Reasons;
        $data = $reasons::all();
        return response() 
                ->json($data)
                ->header('Content-Type', 'application/json');
    }
    function createOne(Request $request) {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $reasons = new Reasons;
        $reasons->name = $data['name'];
        $reasons->save();
        return $reasons->getOriginal();
    }
    function updateOne($id = null, Request $request) {
        if($id == null) {
            return "please pass id parameter";
        }
        $data = $request->validate([
            'name' => 'required'
        ]);
        $reasons = new Reasons;
        $reason = $reasons::find($id);
        if($reason) {
            $reason->name=$data['name'];
        } else {    
            return response("reason id not found", 404);
        }
    }
    function deleteOne($id = null, Request $request) {
        if($id == null) {
            return "please pass id parameter";
        }
        $reasons = new Reasons;
        $reason = $reasons::find($id);
        if($reason) {
            $reason->delete();
            return response()->json([
                'id' => $id
            ]);
        } else {
            return response("reason id not found", 404);
        }
    }

}
