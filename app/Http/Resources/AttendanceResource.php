<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        $u_name = User::find($this->user_id)->name;
        $response_data = [
          'id'=>$this->id,
          'user_id' => $this->user_id,
          'user_name' => $u_name,
          'date' => $this->date,
          'status' => $this->status,
          'start_time' => $this->start_time,
          'end_time' => $this->end_time,
          ];
          return $response_data;
    }
}
