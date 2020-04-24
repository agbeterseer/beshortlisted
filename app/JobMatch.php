<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobMatch extends Model
{
	protected $table = 'job_matches';

    protected $fillable = ['user_id', 'job_id']; 
}
