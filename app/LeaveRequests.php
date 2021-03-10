<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequests extends Model
{
    protected $table = 'leave_requests';
    public $primaryKey='request_id';
}
