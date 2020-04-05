<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruitResume extends Model
{
    //use SoftDeletes; recruit_resumes
     protected $table = 'recruit_resumes';
    
    protected $fillable = ['user_id', 'pr_caption'];
}
