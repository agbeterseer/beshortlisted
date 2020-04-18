<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\User;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
 
class EmployerService
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

	public function registerEmployer(Request $data)
	{
		dd($data);

		$account_type = $request->account_type;
		$email = $request->email;
		$password = $request->password;
		$password_confirmation = $request->password_confirmation;
		$phone = $request->code . $request->phone;
		$name = $request->name;
		$lastname = $request->lastname;
		$comany_name = $request->comany_name;
		$number_of_employees = $request->number_of_employees;
		$industry = $request->industry;
		$type_of_employer = $request->type_of_employer;
		$website = $request->website;

		$contact_address = $request->contact_address;
		$contact_phone_number = $request->code . $request->contact_phone_number;
		$email_notificaiton = $request->email_notificaiton;
		$contact_person = $request->contact_person;
		$country = $request->country; 

		return back();
	}
 

 

}