<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Post;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use DB; 
 
class PostService
{
	protected $model;

	public function __construct(Post $postModel)
	{
		$this->model = new Repository($postModel);
	}
 
	public function all()
	{
		return $this->model->all();
	}
 
	public function create(Request $request)
	{
	$attributes = $request->all();

	return $this->model->create($attributes);

	}

	public function findSingleRecord($id)
	{
     return $this->model->show($id);
	}
 
	public function read($id)
	{
     return $this->model->find($id);
	}
 
	public function update(Request $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->model->update($id, $attributes);
	}
 
	public function delete($id)
	{
      return $this->model->delete($id);
	}
 
	 
	 public function getActivePost()
	 {
	 	return  DB::table('posts')->where('status',1)->get();
	 }
	 public function getActivePostPagination()
	 {
	 	return  DB::table('posts')->where('status',1);
	 }

 

}