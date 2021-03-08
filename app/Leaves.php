<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    protected $table = 'leaves';
    public $primaryKey='leave_id';
    public $timestamps = false;
}
