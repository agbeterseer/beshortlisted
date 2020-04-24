<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryProfession extends Model
{
  protected $table = 'industry_professions';

      protected $fillable = ['name','industry_id'];

   //  public function professions()
   // {
   // 	return $this->belongsToMany('App\Profession','industry_professions', 'industry_id', 'profession_id');
   // }

   public function industry() {
    return $this->hasMany('App\Industry');
}

    public function workexperiences()
   {
   	return $this->belongsToMany('App\WorkExperience','experience_profession', 'work_experience_id', 'industry_profession_id');
   }

       public function userprofessions()
   {
    return $this->belongsToMany('App\User','user_profession', 'user_id', 'industry_profession_id');
   }
      public function tag()
    {
      return $this->belongsTo('App\Tag');
    }
   
}
