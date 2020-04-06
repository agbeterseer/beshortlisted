<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Contact;
use App\ReachUs;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
use DB;

class ContactUsService
{
	protected $model;

	public function __construct(Contact $contactModel)
	{
		$this->model = new Repository($contactModel);
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

	public function SaveContact(Request $request)
	 {
	 	 try {
      if ($request->name !=null && $request->name !='' && $request->email !=null && $request->email !='') {
           $contact = new ReachUs; 
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message; 
            $contact->created_at = $this->returnCurrentTime();
            $contact->save();
            Session::flash('success','Thank you for contacting us. your email has been sent successfully');
            return redirect()->back();#
          }
    } catch (Exception $e) {
            return redirect()->back()->withErrors(['error'=> 'something went wrong']); 
    } 
    return back();
	 } 
 



 

}