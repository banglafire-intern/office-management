<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{
    protected $table='policies';
    public $primaryKey='policy_id';
    public $timestamps = false;
}
