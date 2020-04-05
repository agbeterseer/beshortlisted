<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
   protected $fillable = ['user_id', 'resume_id', 'name', 'position', 'office_address', 'phone_number'];
}
