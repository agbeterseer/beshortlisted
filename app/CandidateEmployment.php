<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateEmployment extends Model
{
     protected $fillable=['candidate_id','start_date', 'end_date', 'end_date', 'position', 'organisation'];
}
