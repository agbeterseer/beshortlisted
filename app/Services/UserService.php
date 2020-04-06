<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
 
class UserService
{
	protected $model;

	public function __construct(User $userModel)
	{
		$this->model = new Repository($userModel);
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

	 public function getLatestUsers()
	 {
	 	return User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
	 }

	 public function company_count()
	 {
	 	return $company_count = User::where('account_type', 'employer')->count();
	 }


 

}