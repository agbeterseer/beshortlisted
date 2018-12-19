<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
            protected $fillable = [
         'name',  'display_name'
    ];

  public function submenu()
   {
   	return $this->belongsTo('App\Submenu');
   }

 
}
