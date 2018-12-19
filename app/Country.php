<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
 protected $fillable = ['id','country'];

   public function workexperience()
    {
        return $this->belongsTo('App\WorkExperience');
    }
}

