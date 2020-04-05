<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeBuilder extends Model
{
  protected $fillable=['name','display_name', 'description', 'status', 'template_link'];
}
