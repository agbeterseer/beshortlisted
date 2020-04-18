<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use DB;
use App\Utility\DateUtil;

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


	 public function check_email($email)
	 {
	 	return $user = DB::table('users')->where('email', $email)->first(); //$email ? $email : null;
	 }

	 public function saveUser(Request $request)
	 {
	 	//dd($request->all());
		$user = User::firstOrNew(['email'=>$request->email]); 
		$user->name = $request->comany_name;
		$user->password = bcrypt($request->password);
		$user->account_type = $request->account_type;
		$user->active = 0;
		$user->confirmation_code = $request->confirmation_code;
		$user->confirmed = 0;
		$user->save();

		return $user;
	 }


 

}