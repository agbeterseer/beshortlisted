<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag; 
use App\Email;
use App\City;
use App\Menu;
use App\Industry;
use App\Post;
use App\ReachUs;
use App\Client;
use DB;
use App\Http\Resources\TagResource;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get tags
        $tags = Tag::orderBy('created_at', 'DESC')->paginate(5);

        // Return collection of tags as a resource
        return TagResource::collection($tags);
    }

        public function SearchBar()
        {
            // $users = User::orderBy('created_at', 'ASC')->paginate(5);
            $industries = DB::table('industries')->orderBy('name')->where('status',1)->get(); 
            $cities = DB::table('cities')->get();
            $industry_professions = DB::table('industry_professions')->get();
            $response = array('cities' => $cities,
                                'industries' => $industries,
                                'industry_professions' => $industry_professions
                                );
           
          return response()->json($response);
        }

        public function getCities()
        {
            $cities = DB::table('cities')->orderBy('name')->get();
            $response = array('cities' => $cities);
             return response()->json($response);
        }
        public function getIndustryProfessions()
        {
            $industry_professions = DB::table('industry_professions')->orderBy('name')->get();
            $response = array(  'industry_professions' => $industry_professions);
             return response()->json($response);
        }
        public function getIndustries()
        {
            $industries = DB::table('industries')->where('status',1)->orderBy('name')->get();
            $response = array('industries' => $industries);
             return response()->json($response);
        }
        public function getVacancyTypes()
        {
            $employement_term_list = DB::table('employement_terms')->where('status',1)->orderBy('name')->get();
            $response = array('employement_term_list' => $employement_term_list);
             return response()->json($response);
        }

        public function getJobs()
        {
        $tags = Tag::where('status',1)->where('active',1)->orderBy('created_at', 'DESC')->paginate(5);
           // $tags = Tag::where('status',1)->where('active',1)->paginate(20); 
         return TagResource::collection($tags); 
        }


    public function JobListing(Request $request){
        $s = $request->input('s');
        $location = $request->input('location');
        $job_function = $request->input('job_function');
        $location = City::findOrFail($location);
        if ($s && isset($location) ) {
            $tags = Tag::where(function($query) use ($location, $s){
            $query->orWhere('city', $location->name)->search(strtolower($s))->where('status',1)->where('active',1);
            })->paginate(20);
        }
        if ($s && $location && $job_function) {
        $tags = DB::table('tags')
          ->where('status', 1)
          ->where('active',1)
          ->where('industry',$s)
          ->where('city', $location->name)
          ->where('job_category', $job_function)
          ->orderby('created_at', 'DESC')
          ->paginate(20); 
        }
        if($location) {
           $tags = DB::table('tags')
          ->where('status', 1)
          ->where('active',1) 
          ->where('city', $location->name) 
          ->orderby('created_at', 'DESC')
          ->paginate(20);
        }else{
         $tags = Tag::where('status',1)->where('active',1)->paginate(20);     
        }
 $tags = Tag::where('status',1)->where('active',1)->paginate(20); 
        $industry_professions = DB::table('industry_professions')->get();
        $employement_term_list = DB::table('employement_terms')->get();

        $cities = DB::table('cities')->get();
    $job_type_count = DB::table('tags')
             ->select('job_type', DB::raw('count(*) as total'))
             ->groupBy('job_type')->get();
    $city_count = DB::table('tags')
             ->select('city', DB::raw('count(*) as total'))
             ->groupBy('city')->get();
    $query = Industry::all();
        $industries = $query->where('status',1)->get(); 
$menus = $this->displayMenu();
$posts = $this->listPages();
  return view('jobs.job_listing', compact('tags', 'industry_professions', 'employement_term_list', 's', 'cities', 'job_type_count', 'city_count', 'industries', 's', 'location', 'job_function', 'menus', 'posts'), array('user' => Auth::user()));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Tag::findOrFail($request->job_id) : new Tag;

        $article->id = $request->input('job_id');
        $article->job_title = $request->input('job_title');
        $article->description = $request->input('description');

        if($article->save()) {
            return new TagResource($article);
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get article
        $article = Tag::findOrFail($id);

        // Return single article as a resource
        return new TagResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get article
        $article = Tag::findOrFail($id);

        if($article->delete()) {
            return new TagResource($article);
        }    
    }
}
