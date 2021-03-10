<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remainings extends Model
{
    protected $table = 'remainings';
    public $primaryKey='id';
    public $timestamps = false;
}
