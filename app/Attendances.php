<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    protected $table = 'attendances';
    public $primaryKey = 'id';
    public $timestamps = false;
}
