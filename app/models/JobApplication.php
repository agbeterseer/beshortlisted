<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
	 protected $table = 'job_applications';
    protected $fillable = ['document_id','user_id', 'resume_id', 'job_id', 'status','sorted', 'sort_by_category'];

      public function user()
    {
    	return $this->belongsTo('App\User');
    }
      public function document()
    {
    	return $this->belongsTo('App\Document');
    }
      public function tag()
    {
    	return $this->belongsTo('App\Tag');
    }
}
