<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerPackage extends Model
{
	protected $table = 'employer_packages';

     protected $fillable = ['userfkp','package_id', 'jobs_remaning', 'features_remaining', 'renew_remaining', 'job_duration', 'status', 'units', 'amount', 'reference'];
}
