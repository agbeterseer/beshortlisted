<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Role;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
 
class RoleService
{
	protected $model;

	public function __construct(Role $roleModel)
	{
		$this->model = new Repository($roleModel);
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


 

}