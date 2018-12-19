<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionMeta extends Model
{
 protected $table = 'profession_metas';
 protected $fillable = ['name','description','display_name'];
 
 public function tag()
   {
   	return $this->belongsTo('App\Tag');
   }
    public function profession()
   {
   	return $this->belongsTo('App\Profession');
   }
}
