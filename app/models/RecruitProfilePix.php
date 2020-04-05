<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruitProfilePix extends Model
{
     protected $table = 'recruit_profile_pixs';
    
    protected $fillable = ['user_id', 'pr_caption'];
}
