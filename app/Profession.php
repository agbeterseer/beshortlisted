<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $fillable = ['name','description','display_name'];

    public function documents()
    {
    	return $this->belongsToMany('App\Document')->using('App\DocumentProfession');
    }
   
    public function scopeSearch($query, $s)
   {
   	return $query->where('name', 'like', '%' .$s. '%')
   		->orWhere('name', 'like', '%' .$s. '%');
   }
   //    public function scopeSearch($query, $s)
   // {
   // 	return $query->where('years_of_experience', 'like', '%' .$s. '%')
   // 		->orWhere('candidates_name', 'like', '%' .$s. '%');
   // } 
}
