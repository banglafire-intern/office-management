<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Attendances;
use App\User;
use App\Http\Resources\AttendanceResource;
use Illuminate\Support\Facades\Validator;

class AttendancesController extends Controller
{
    public function createOne(Request $request) {
            $datas = $request->validate([
                "data.*.user_id" => "required",
                "data.*.date" => "required",
                "data.*.status" => "required",
                "data.*.start_time" => "required",
                "data.*.end_time" => "required",
                "data.*.reason_id" => "present",
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
                    $attendances->reason_id = $row['reason_id'];
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
                "data.*.reason_id" => "present",
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
                    $attendance->reason_id = $row['reason_id'];
                    $attendance->save();
                }
            });
            return response('attendance updated successfully', 200);
    }


    public function index(Request $request) {
      try{
        $per_page = env("PER_PAGE_VIEW_API",5);
        $validator = Validator::make($request->all(), [
            'per_page' => 'integer',
            'page' => 'integer',
        ]);
        if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
        }
        if ($request->has('per_page')) {
          $per_page = $request->per_page;
        }
        
        $data = User::where('role','employee')->paginate($per_page);

        return response()->json($data, 200);

      } catch (\Exception $th) {
        return response()->json("Error!", 404);
      }
    }

    public function updateMacAddress(Request $request) {
      try{
        $validator = Validator::make($request->all(), [
          'id' => 'integer|required',
          'mac' => 'string|required',
        ]);
        if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
        }

        $user = User::findOrFail($request->id);

        $user->mac_address = $request->mac;
        $user->save();

        return response()->json("Success!", 201);
      } catch (\Exception $th) {
        return response()->json("Error!", 404);
      }
    }

    public function searchAttendance(Request $request,$date) {
      try{
        $data = Attendances::where('date',$date)->get();
        return AttendanceResource::collection($data);
      } catch (\Exception $th) {
        return response()->json("Error!", 404);
      }
    }
}