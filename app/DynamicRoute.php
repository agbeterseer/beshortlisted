<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicRoute extends Model
{
     protected $fillable=['name','as', 'uses', 'link'];
}
