<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanProperty extends Model
{
	protected $table = 'plan_properties';
	protected $fillable = ['planpackage_id','propety', 'status'];

       public function packages()
    {
        return $this->belongsTo('App\Planpackage');
    }
 
}
