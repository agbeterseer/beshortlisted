<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldsOfStudy extends Model
{	
	 protected $table = 'fields_of_studies';

    protected $fillable = ['title','display_name', 'body', 'status'];
}
