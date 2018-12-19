<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    protected $fillable =  [ 'userid', 'resumeid', 'job_skill' ];
}
