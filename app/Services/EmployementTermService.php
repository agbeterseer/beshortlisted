<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\EmployementTerm;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
use DB;
 
class EmployementTermService
{
	protected $model;

	public function __construct(EmployementTerm $employementTermModel)
	{
		$this->model = new Repository($employementTermModel);
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

	 public function getemployementTermsOrderByName()
	 {
	 	return DB::table('employement_terms')->orderBy('name')->where('status',1)->get();
	 }

	 public function employement_term_Unorderedlist()
	 {
	 	return DB::table('employement_terms')->where('status',1)->get();
	 }

 
 

}