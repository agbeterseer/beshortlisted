<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{ 
 protected $fillable = ['job_title','code', 'display_name', 'client', 'profession_id', 'status', 'url', 'end_date', 'experience', 'job_level', 'job_category', 'salary_range', 'industry', 'qualificaiton', 'description', 'package_id', 'deadline_submission', 'country', 'region', 'city', 'full_address', 'email_address', 'active'];
   
   public function professionMeta()
   {
   	return $this->hasMany('App\ProfessionMeta');
   }

     public function applications()
    {
        return $this->hasMany('App\Application');
    }
 
           public function industryprofessions()
    {
        return $this->hasMany('App\IndustryProfession');
    }

       public function scopeSearch($query, $s) {
   		return $query->where('job_title', 'like', '%' .$s. '%');
   }

       public function scopeActive($query){
        
        return $query->where('active', 1);
    }//$users = App\User::popular()->active()->orderBy('created_at')->get();
    public function scopeStatus($query){
        
        return $query->where('status', 1);
    }//$users = App\User::popular()->active()->orderBy('created_at')->get();
    public function scopeDraft($query){
        
        return $query->where('draft', 1);
    }//$users = App\User::popular()->active()->orderBy('created_at')->get();

  public static function job_post()
  {
     return Tag::distinct()->get();
  }

 
}
