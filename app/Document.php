<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
 
class Document extends Model
{
   protected $fillable=['candidates_name','years_of_experience'];

   public function professions()
   {
   	return $this->belongsToMany('App\Profession','document_profession', 'document_id', 'profession_id');
   }

     public function city()
   {
   	return $this->belongsTo('App\City');
   }
     public function region()
   {
      return $this->belongsTo('App\Region');
   }

   public function scopeSearch($query, $s)
   {
   	return $query->where('years_of_experience', 'like', '%' .$s. '%')
   		->orWhere('candidates_name', 'like', '%' .$s. '%');
   }

   public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("sort_by_cat", "LIKE","%$keyword%")
                    ->orWhere("years_of_experience", "LIKE", "%$keyword%")
                    ->orWhere("city_id", "LIKE", "%$keyword%")
                    ->orWhere("region_id", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

// public function getAgeAttribute()
// {
//     return Carbon::parse($this->attributes['birthdate'])->age;
// }


public function age() {
return $this->date_of_birth->diffInYears(\Carbon::now());

 }
         public function applications()
    {
        return $this->hasMany('App\Application');
    }


         public function WorkExperiences()
    {
        return $this->hasMany('App\WorkExperience');
    }
 
   
//public function getDOB(){ return $this->dob->format('d-m-Y'); }

}