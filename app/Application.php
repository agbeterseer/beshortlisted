<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    
    protected $fillable = ['document_id','user_id', 'resume_id', 'tag_id', 'status','sorted', 'sort_by_category'];

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

        /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query){
        
        return $query->where('delete', 1);
    }//$users = App\Application::popular()->active()->orderBy('created_at')->get(););

    public function getApplicationsByID($tag_id){
        
       return $query->where('tag_id', $tag_id);
    }

}
