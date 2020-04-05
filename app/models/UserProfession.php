<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfession extends Model
{
    protected $fillable = ['user_id', 'industry_profession_id', 'resume_id', 'work_experience_id'];
}
