<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePolicyRequest;
use Auth;
use App\Policy;

class PolicyController extends Controller
{
        public function __construct()
    {
     $this->middleware('auth');
    }

  public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $policyList  = Policy::all();
        return view('admin.policies.index', compact('policyList'), array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->all());
 
        return view('admin.policies.create', array('user' => Auth::user()));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePolicyRequest $request)
    {
    //dd($request->all());
        
        $title = $request->title;
        $description = $request->description;
        if ($title  !=null && $title !='' && $description !=null && $description !='') {
            $policy = Policy::firstOrNew(['title'=> $title]); 
            $policy->description = $description;
           // $policy->created_at = $this->returnCurrentTime();
            $policy->save();
            # code...
            Session::flash('success','Done successfully');

     return redirect()->route('policies.edit', $policy->id);
        }

          $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
    );
  //dd($commentrecord);
 //return response()->json($response);
    
       return  redirect()->back();
    }


    public function Savepolicy(Request $request)
    {
      $title = $request->title;
        $description = $request->description;
      if ($title  !=null && $title !='' && $description !=null && $description !='') {
            $policy = Policy::firstOrNew(['title'=> $title]);
            $policy->title = $title;
            $policy->description = $description;
           //$policy->created_at = $this->returnCurrentTime();
            $policy->status = 1;
            $policy->save();
            # code...
            Session::flash('success','Done successfully');
        

        $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
                 );
  
        return redirect()->route('policies.edit', $policy->id);
    }
     return  redirect()->back();
    }


    public function PreivewPolicy($id)
    {
    $policy = Policy::findOrFail($id);

    return view('admin.policies.preview_policy', compact('policy'), array('user' => Auth::user())); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $policy = Policy::where('id',$id)->where('status', 1)->orderBy('created_at', 'DESC')->first(); 

      return view('policy_document', compact('policy'), array('user' => Auth::user())); 
    }
    public function DisplayPolicy()
    {
     $policy = Policy::where('status', 1)->orderBy('created_at', 'DESC')->first(); 

      return view('policy_document', compact('policy'), array('user' => Auth::user())); 
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
        $policy = Policy::findOrFail($id);

    return view('admin.policies.edit', compact('policy'), array('user' => Auth::user())); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Updatepolicy(Request $request)
    {
         // dd($request->all());
        //
        $title = $request->title;
        $description = $request->description;
        $id = $request->policy_id;

        if ($id !=null && $id !='' && $title  !=null && $title !='' && $description !=null && $description !='') {
            $policy = Policy::findOrFail($id);
            $policy->title = $title;
            $policy->description = $description;
            //$policy->updated_at = $this->returnCurrentTime();
            $policy->save();
            # code...
            Session::flash('success','Done successfully');
        }
 return redirect()->route('policies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        DB::table("policies")->where('id',$id)->delete();
        Session::flash('success','Policy has been deleted successfully');
       return redirect()->route('policies.index')->withMessage('Policy Deleted');
    }

}
