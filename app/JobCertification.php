<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCertification extends Model
{
	protected $table = 'job_certifications';

  protected $fillable = ['name','date_received'];
}
