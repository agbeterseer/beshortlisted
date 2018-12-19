<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
         protected $fillable = [
         'submenu',  'submenu_order', 'tag_line', 'link', 'route'
    ];

   public function menus()
   {
   	return $this->hasMany('App\Menu');
   }
}
 