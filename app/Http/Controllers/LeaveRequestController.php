<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveRequests;

class LeaveRequestController extends Controller
{
    public function createOne(Request $request) {
        $requests = new LeaveRequests;
        $data = $request->validate([
            'user_id' => 'required',
            'leave_id' => 'required',
            'available_days' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $requests->user_id = $data['user_id'];
        $requests->leave_id = $data['leave_id'];
        $requests->available_days = $data['available_days'];
        $requests->start_date = $data['start_date'];
        $requests->end_date = $data['end_date'];
        // approve_status has a default value of pending
        $requests->approve_status = 'pending';
        $requests->save();
        return $requests->getOriginal();
    }
    public function fetchAll(Request $request) {
        if($request->input('approve_status')) {
            $approve_status = $request->input('approve_status');
        } else {
            $approve_status = "pending";
        }
        $requests = LeaveRequests::where('approve_status', '=', $approve_status) 
            -> paginate(1);
        return response()->json($requests)->header('Content-Type', 'application/json');
    }
    public function fetchForOneUser($user_id = null, Request $request) {
        if($user_id == null) {
            return "please pass user_id as parameter";
        }
        $requests = LeaveRequests::where('user_id', $user_id)->get();
        return response()->json($requests)->header('Content-Type', 'application/json');
    }
    public function editOneRequest(Request $request, $request_id = null) {
        if($request_id == null) {
            return "please pass request_id as parameter";
        }
        $leaveRequest = LeaveRequests::find($request_id);
        if($leaveRequest) {
            $data = $request->validate([
                'approve_status' => 'required'
            ]);
            $leaveRequest->approve_status = $data['approve_status'];
            $leaveRequest->save();
            return $leaveRequest->getOriginal();
        } else {
            return response("leave_request id not found", 404);
        }
    }
}
