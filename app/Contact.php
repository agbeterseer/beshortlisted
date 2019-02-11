<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
      protected $fillable =  ['country', 'state', 'city', 'street_name', 'postalcode', 'phonenumber', 'email', 'fulladdress'];
}
