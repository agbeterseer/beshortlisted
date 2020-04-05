<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerCard extends Model
{
   protected $fillable = ['card_number','expiration_date', 'card_holder_name', 'cvv', 'status'];
}
