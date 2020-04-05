<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControlApplication extends Model
{
    protected $fillable = ['application_id', 'job_id', 'status'];

}
