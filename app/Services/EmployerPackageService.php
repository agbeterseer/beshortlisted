<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\EmployerPackage;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
 
class EmployerPackageService
{
	protected $model;

	public function __construct(EmployerPackage $employerPackageModel)
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

	 public function getUserByCreatedAt()
	 {
	 	return $users = User::orderBy('created_at', 'ASC')->paginate(5);
	 }

	 public function getUserActivePackage($user)
	 {
	 	return EmployerPackage::where('status', 1)->where('userfkp', $user->id)->first(); 
	 }

 

}