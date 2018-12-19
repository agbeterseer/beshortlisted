<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
       protected $fillable = ['user_id','interest','association', 'award', 'personal_page', 'status'];
}
