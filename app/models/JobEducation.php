<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class JobEducation extends Model
{
  protected $fillable =  [ 'start_year', 'start_month', 'end_year', 'end_month', 'qualification', 'school_name', 'feild_of_study', 'country', 'userid', 'resume_id'];
}
