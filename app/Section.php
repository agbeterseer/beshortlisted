<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable=['name','section_fk','user_code', 'resume_code', 'order', 'status'];
}
