<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobcareerLevel extends Model
{
	protected $table = 'jobcareer_levels';
   protected $fillable = ['name','status'];
}
