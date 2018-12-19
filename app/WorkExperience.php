<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = ['start_year', 'start_month', 'end_year', 'end_month', 'position_title', 'career_level', 'company_name', 'country', 'responsibilities', 'status', 'userfk', 'resumefk', 'present'];

    public function industries()
   {
   	return $this->belongsToMany('App\Industry','work_industry', 'work_experience_id', 'industry_id');
   }

     public function industryprofessions()
   {
   	return $this->belongsToMany('App\IndustryProfession','experience_profession', 'work_experience_id', 'industry_profession_id');
   }

    public function coutries(){
        return $this->hasMany('App\Country', 'country');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
    
    public function document(){
        return $this->hasMany('App\Country', 'country');
    }
 

}
