<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['title','content', 'url', 'post_type', 'image_link'];
}
