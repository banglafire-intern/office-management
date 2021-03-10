<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remainings;

class RemainingsController extends Controller
{
    public function getOne($user_id = null, $leave_id = null, Request $request) {
        if($user_id == null || $leave_id == null) {
            return "please pass user_id & leave_id as parameter";
        } 
        $remainings = new Remainings;
        $remaining = $remainings::
            where('user_id', '=', $user_id)
            ->where('leave_id', '=', $leave_id)
            ->first();
       if($remaining) {
            return $remaining->getOriginal();
       } else {
            return response("user id and leave id not found", 404);
       } 

    } 
    public function createOne($user_id = null, $leave_id = null, Request $request) {
        if($user_id == null || $leave_id == null) {
            return "please pass user_id & leave_id as parameter";
        } 
        $remainings = new Remainings;
        $data = $request->validate([
            'days' => 'required'
        ]);
        $remainings->user_id = $user_id;
        $remainings->leave_id = $leave_id;
        $remainings->days = $data['days'];
        $remainings->save();
        return $remainings->getOriginal();
    }

    public function updateOne($user_id = null, $leave_id = null, Request $request) {
        if($user_id == null || $leave_id == null) {
            return "please pass user_id & leave_id as parameter";
        } 
        $remainings = new Remainings;
        $remaining = $remainings::
            where('user_id', '=', $user_id)
            ->where('leave_id', '=', $leave_id)
            ->first();
       if($remaining) {
            $data = $request->validate([
                'days' => 'required'
            ]);
            $remaining->days = $data['days'];
            $remaining->save();
            return $remaining->getOriginal();
       } else {
            return response("user id and leave id not found", 404);
       } 
    }
}
