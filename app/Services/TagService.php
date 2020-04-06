<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Tag;
use App\Repositories\Repository;
use Illuminate\Http\Request; 
use DB;

class TagService
{
	protected $model;

	public function __construct(Tag $logoModel)
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

 	public function readOrFail($id)
	{
     return $this->model->findOrFail($id);
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

	public function getActiveTag()
	{
		return  Tag::where('status',1)->where('active', 1);
	}

	public function getActiveTagsPaginate()
	{
		return DB::table('tags')->where('status',1)->where('active', 1)->orderBy('created_at', 'DESC')->paginate(8);
	}

	public function getFeaturedJobs()
	{
		return DB::table('tags')->where('status',1)->where('active', 1)->where('featured',1)->orderBy('created_at', 'DESC');
		 //DB::table('tags')->where('featured', 1)->where('active', 1)->paginate(6);
	}

	public function getJobByPagination()
	{
		return DB::table('tags')->where('status',1)->where('active', 1)->orderBy('created_at', 'DESC')->paginate(4);
	}

	public function getAllJobs()
	{
		return DB::table('tags')->where('active', 1)->orderBy('created_at', 'DESC')->get(); 
	}

  
	 public function getGroupTagsByIndustry()
	 {
	 	return DB::table('tags')
             ->select('industry', DB::raw('count(*) as total'))
             ->groupBy('industry');
	 }

	 public function getGroupTagsByCity()
    {
            $city_count = DB::table('tags')
                 ->select('city', DB::raw('count(*) as total'))
                 ->groupBy('city')->where('status',1)->where('active',1)->get();
    return $city_count; 
    }

	 // public function getGroupTagsByCity()
	 // {
	 // 	return DB::table('tags')
  //            ->select('city', DB::raw('count(*) as total'))
  //            ->groupBy('city')->get();
	 // }

	 public function getJobFunctionCount()
	 {
	 	return DB::table('tags')->where('status', 1)->where('active',1)->where('awaiting_aproval', 0)
             ->select('industry', DB::raw('count(*) as total'))
             ->groupBy('industry')->get();  
	 }

	   public function jobTypeCount()
    {
       $job_type_count = DB::table('tags')
                 ->select('job_type', DB::raw('count(*) as total'))
                 ->groupBy('job_type')->where('status',1)->where('active',1)->get();

      return $job_type_count;
    }

        public function industryCount()
    {
           $industry_count = DB::table('tags')
                 ->select('industry', DB::raw('count(*) as total'))
                 ->groupBy('industry')->where('status',1)->where('active',1)->get();

      return $industry_count;
    }

      public function industryProfessionsCount()
    {
           $industry_professions_count = DB::table('tags')
                 ->select('job_category', DB::raw('count(*) as total'))
                 ->groupBy('job_category')->where('status',1)->where('active',1)->get();

      return $industry_professions_count;
    }

	public function findByIndustryIDAndJobCategoryAndSalaryRang($tag)
	{
		return Tag::latest()->where('industry',$tag->industry)->orWhere('job_category',$tag->job_category)->orWhere('salary_range', $tag->salary_range);
	}


	public function getTagsGroupByIndustry()
	{
		return $job_function_count = DB::table('tags')->where('status', 1)->where('active',1)->where('awaiting_aproval', 0)
        ->select('industry', DB::raw('count(*) as total'))
        ->groupBy('industry')->get();

	}

	public function getJobByIndustry($code)
	{
		return DB::table('tags')->where('industry',$code)->where('status', 1)->get();
	}
 
    public function cityCount()
    {
            $city_count = DB::table('tags')
                 ->select('city', DB::raw('count(*) as total'))
                 ->groupBy('city')->where('status',1)->where('active',1)->get();
    return $city_count;
    }

}