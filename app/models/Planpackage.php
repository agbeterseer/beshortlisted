<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planpackage extends Model
{
    protected $table = 'planpackages';
    protected $fillable = ['title','price','job_posting', 'featured_jobs', 'renew_jobs', 'job_duration', 'make_active', 'price_in_kobo'];
    
     public function properties()
    {
        return $this->hasMany('App\PlanProperty');
    }
}
