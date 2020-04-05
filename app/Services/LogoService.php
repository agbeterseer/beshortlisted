<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Logo;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
 
class LogoService
{
	protected $model;

	public function __construct(Logo $logoModel)
	{
		$this->model = new Repository($logoModel);
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

	public function save_logo($request)
	{
		// dd($request->all());
	

	if ($request->hasFile('logo')) {

		$logo = $request->file('logo');

      $filename = time() . '.' . $logo->getClientOriginalExtension();
      Image::make($logo)->resize(300, 300)->save(public_path('/logo/' . $filename));

      $logo_record = new Logo;
      $logo_record->logo = $filename;
      $logo_record->status = 1;
      $logo_record->save();

        Session::flash('success-avatar','Image Change successfully');
     \LogActivity::addToLog('Log Created.');
           return redirect()->back();
    }
      return redirect()->back();
	 }


	 public function getActiveLogo()
	 {
	 	return DB::table('logos')->where('status', 1)->first();
	 	
	 }

 

}