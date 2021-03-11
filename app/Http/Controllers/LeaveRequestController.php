<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveRequests;
use App\Remainings;
use DateTime;

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

    private function updateRemainigs($user_id = null, $leave_id = null, $days) {
        if($user_id == null || $leave_id == null) {
            return "please pass user_id & leave_id as parameter";
        } 
        $remainings = new Remainings;
        $remaining = $remainings::
            where('user_id', '=', $user_id)
            ->where('leave_id', '=', $leave_id)
            ->first();
       if($remaining) {
           if($remaining->days >= $days) {
            $remaining->days = $remaining->days - $days;
           } else {
            $remaining->days = 0;
           }
            $remaining->save();
            return $remaining->getOriginal();
       } else {
            // return response("user id and leave id not found", 404);
            return "user_id & leave_id not found";
       } 
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
            if($leaveRequest->approve_status == "accepted") {
                $day1 = new DateTime($leaveRequest->start_date);
                $day2 = new DateTime($leaveRequest->end_date);
                $diff = $day1->diff($day2);
                $interval = intval($diff->format('%a'), 10);
                echo $interval;
                $response = $this->updateRemainigs($leaveRequest->user_id, $leaveRequest->leave_id, $interval);
                return $response;
            }
            return $leaveRequest->getOriginal();
        } else {
            return response("leave_request id not found", 404);
        }
    }

}
