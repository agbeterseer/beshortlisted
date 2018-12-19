<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
        protected $fillable = [ 'name'];

          public function professions()
   {
   	return $this->belongsToMany('App\Profession','industry_professions', 'industry_id', 'profession_id');
   }
     public function workexperiences()
   {
   	return $this->belongsToMany('App\WorkExperience','work_industry', 'work_experience_id', 'industry_id');
   }
        public function users()
   {
    return $this->belongsToMany('App\User','user_industry', 'user_id', 'industry_id');
   }

    public function scopeSearch($query, $s)
   {
   	return $query->where('name', 'like', '%' .$s. '%')
   		->orWhere('name', 'like', '%' .$s. '%');
   }

         public function user()
    {
      return $this->belongsTo('App\User');
    }
}
 