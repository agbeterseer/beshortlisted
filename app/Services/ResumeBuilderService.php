<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\ResumeBuilder;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
 
class ResumeBuilderService
{
	protected $model;

	public function __construct(ResumeBuilder $resumeBuilderModel)
	{
		$this->model = new Repository($resumeBuilderModel);
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

	 public function getActiveUsers()
	 {
	 	return User::where('active', 1)->get();
	 }

	 public function getActiveUsersWtihEmployerAccountType()
	 {
	 	return User::where('active', 1)->where('account_type', 'employer');
	 }

	 public function getActiveMenu()
	 {
	 	return Menu::where('status', 1)->orderBy('menu_order', 'ASC')->get();
	 }


 

}