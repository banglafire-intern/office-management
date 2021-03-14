<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Attendances;

class AttendancesController extends Controller
{
    public function createOne(Request $request) {
            $datas = $request->validate([
                "data.*.user_id" => "required",
                "data.*.date" => "required",
                "data.*.status" => "required",
                "data.*.start_time" => "required",
                "data.*.end_time" => "required"
            ]);
            // DB transaction to save all data in database
            // if any one entry fails all data will be rolled back
            DB::transaction(function() use($datas) {
                foreach($datas['data'] as $row) {
                    $attendances = new Attendances;
                    $attendances->user_id=$row['user_id'];
                    $attendances->date=$row['date'];
                    $attendances->status=$row['status'];
                    $attendances->start_time=$row['start_time'];
                    $attendances->end_time=$row['end_time'];
                    $attendances->save();
                }
            });
            return response('attendance saved successfully', 200);
    }
    public function updateOne(Request $request) {
            $datas = $request->validate([
                "data.*.id" => "required",
                "data.*.user_id" => "required",
                "data.*.date" => "required",
                "data.*.status" => "required",
                "data.*.start_time" => "required",
                "data.*.end_time" => "required",
            ]);
            // DB transaction to save all data in database
            // if any one entry fails all data will be rolled back
            DB::transaction(function() use($datas) {
                foreach($datas['data'] as $row) {
                    $attendances = new Attendances;
                    $attendance = $attendances::find($row['id']);
                    $attendance->user_id=$row['user_id'];
                    $attendance->date=$row['date'];
                    $attendance->status=$row['status'];
                    $attendance->start_time=$row['start_time'];
                    $attendance->end_time=$row['end_time'];
                    $attendance->save();
                }
            });
            return response('attendance updated successfully', 200);
    }
}