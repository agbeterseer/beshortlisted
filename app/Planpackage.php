<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planpackage extends Model
{
    protected $fillable = ['title','price','job_posting', 'featured_jobs', 'renew_jobs', 'job_duration'];
    
     public function properties()
    {
        return $this->hasMany('App\PlanProperty');
    }
}
