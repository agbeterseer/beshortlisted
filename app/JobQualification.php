<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobQualification extends Model
{
   protected $fillable =  [ 'userkey', 'resumekey', 'qualificaiton' ];
}
