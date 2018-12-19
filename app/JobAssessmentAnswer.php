<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAssessmentAnswer extends Model
{
	protected $table = 'job_assessment_answers';
 	protected $fillable = ['question_id','job_id', 'job_application_id', 'answer'];
}
