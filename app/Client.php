<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =  ['name', 'display_name', 'category', 'website', 'founded_date', 'email', 'full_address', 'description', 'country', 'region', 'city', 'user_id'];

}
