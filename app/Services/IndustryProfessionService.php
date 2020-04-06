<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\IndustryProfession;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
use DB;
 
class IndustryProfessionService
{
	protected $model;

	public function __construct(IndustryProfession $employerPackageModel)
	{
		$this->model = new Repository($employerPackageModel);
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
 
	 public function getActiveIndustryProfessionByName()
	 {
	 	return DB::table('industry_professions')->orderBy('name')->where('status',1)->get();
	 }

	 public function getActiveIndustryProfessionPagination()
	 {
	 	return DB::table('industry_professions')->where('status',1)->orderBy('created_at', 'DESC')->paginate(8);
	 }


	 

 

}