<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\RecruitProfilePix;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
use DB;
use App\Utility\DateUtil;

class RecruitProfilePixService extends DateUtil
{
	protected $model;
	protected $dateUtil;

	public function __construct(RecruitProfilePix $recruitProfilePixmodel)
	{
		$this->model = new Repository($recruitProfilePixmodel); 
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

	public function recruit_profile_pix($user)
	{ 
 		return $recruit_profile_pix = DB::table('recruit_profile_pixs')->insert(['user_id' => $user->id, 'order' => 1, 'status' => 1, 'created_at' => $this->returnCurrentTime()]);
	}
  


 

}