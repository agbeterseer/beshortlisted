<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequently extends Model
{
	 protected $table = 'frequentlies';

    protected $fillable = ['question','answer'];
}
