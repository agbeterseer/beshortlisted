<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
   protected $fillable = ['title','display_name', 'body', 'status'];
}
