<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserIndustry extends Model
{
    protected $fillable = ['user_id', 'indystry_id', 'resume_id', 'work_experience_id'];

        public function industries()
    {
        return $this->hasMany('App\Industry');
    }

}
