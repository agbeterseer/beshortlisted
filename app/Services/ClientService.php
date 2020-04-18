<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Client;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
use DB;

class ClientService
{
	protected $model;

	public function __construct(Client $clientModel)
	{
		$this->model = new Repository($clientModel);
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

	public function getCitiesOrderByName()
	{
	return DB::table('cities')->orderBy('name')->get();
	}


	public function CustomSave(Request $request)
	{
		
		
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

		$client = Client::firstOrNew(['name' => $comany_name]);
		$client->name = $comany_name; 
		$client->phone_number = $phone;
		$client->website = $website;
		$client->country = $country; 
		$client->full_address = $contact_address;
		$client->number_of_employees = $number_of_employees;
		$client->type_of_employment = $type_of_employer;
		$client->industry = $industry;
		$client->contact_person_name = $contact_person;
		$client->contact_person_email = $email_notificaiton; 
		$client->contact_person_number = $contact_phone_number; 
		$client->user_id = $user->id;
		$client->created_at = $this->returnCurrentTime();
		$client->save();
		 
		return $client;
	}


 

}