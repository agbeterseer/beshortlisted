<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\PageInformation;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
use DB;
 
class PageInformationService
{
	protected $model;

	public function __construct(PageInformation $pageInformationhModel)
	{
		$this->model = new Repository($pageInformationhModel);
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

	public function getPageInformation()
	{
		return DB::table('page_informations')->where('category', 'index')->first();
	}

	public function getPageInformationInput($code)
	{
		if ($code === 'employee') {
			return DB::table('page_informations')->where('category', 'employee')->first();
		}elseif ($code === 'index') {
			return DB::table('page_informations')->where('category', 'index')->first();
		}elseif ($code === 'employer') {
			return DB::table('page_informations')->where('category', 'employer')->first();
		}
		
	}
  


 

}