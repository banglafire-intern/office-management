<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reasons extends Model
{
    protected $table = 'reasons';
    public $primaryKey='reason_id';
    public $timestamps = false;
}
