<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Industry;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
use DB;
 
class IndustryService
{
	protected $model;

	public function __construct(Industry $industryModel)
	{
		$this->model = new Repository($industryModel);
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
 
	 public function getActiveIndustryByName()
	 {
	 	return  DB::table('industries')->where('status',1)->orderBy('name')->orderBy('created_at', 'DESC')->get();
	 	  
	 }


 

}