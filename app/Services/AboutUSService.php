<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\AboutUS;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
use DB;

class AboutUSService
{
	protected $model;

	public function __construct(AboutUS $aboutUSModel)
	{
		$this->model = new Repository($aboutUSModel);
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

	public function getAboutUSOrderByCreatedAt()
	{
		return DB::table('aboutuses')->orderBy('created_at', 'DESC')->first();
	}



 

}