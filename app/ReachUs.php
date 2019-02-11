<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReachUs extends Model
{
	protected $table = 'reachus';
     protected $fillable = ['name', 'email', 'message'];
}
