<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployementTerm extends Model
{
    protected $fillable = ['name','status', 'category'];
}
