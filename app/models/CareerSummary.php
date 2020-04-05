<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerSummary extends Model
{
     protected $fillable =  [ 'user_id', 'resume_id', 'summary' ];

}