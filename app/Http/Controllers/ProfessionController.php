<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;
use App\User;
use Auth;
use DB;
use \Storage;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session; 
class ProfessionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */ 
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:superuser')->only('create');
    }


    public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }

     public function index(Request $request)
    {
 
    // $professions = Profession::all();
            $professions = DB::table('professions')->orderBy('created_at','DESC')->get();
     // dd($professions);/
         
     return view('admin.profession.index', compact(['professions', 's']), array('user' => Auth::user()));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    return view('admin.profession.create', array('user' => Auth::user()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $profession = $request->profession;
        $description = $request->description;
        $display_name = $request->display_name;

        $currentTime = $this->returnCurrentTime();
    
        if ($profession !=null && $profession !='') {

            // $profession = DB::table('professions')->insert(['name' => $profession, 'display_name' => $display_name, 'description' => $description, 'created_at' => $currentTime]);

            try {

            $profession = Profession::firstOrCreate(['name'=> $profession]);
            $profession->display_name = $display_name;
            $profession->description = $description;
            $profession->created_at = $currentTime;
            $profession->save();

                $request->session()->flash('message.level', 'success');
                $request->session()->flash('message.content', 'Profession Added successfully!');
            return redirect()->route('profession.index');     
        
            } catch (Exception $e) {
               $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'There was an error Error!');
            return redirect()->back();
            }       
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'There was an error Error!');
            return redirect()->back();
        }

   return redirect()->route('profession.index');

    }


    public function edit($id) {

    if($id !=null){
        $profession=Profession::find($id);
    return view('admin.profession.edit', compact('profession'), array('user' => Auth::user()));
    
    }else{
      return 'ID MUST BE AVAILABLE';
    }

    }


    public function update(Request $request, $id)
    {
        if ($id !=null && $request !=null) {
                 $profession=Profession::find($id);
                 $profession->name = $request->profession;
                 $profession->display_name = $request->display_name;
                 $profession->description = $request->description;
                 $profession->save();

                $request->session()->flash('message.level', 'success');
                $request->session()->flash('message.content', 'Profession Added successfully!');

                return redirect()->route('profession.index');   
        }else{
                $request->session()->flash('message.level', 'danger');
                $request->session()->flash('message.content', 'There was an error Error!');
            return redirect()->back();
        }
       // return redirect()->route('profession.index');
    }

    public function destroy($id)
    {
        DB::table("professions")->where('id',$id)->delete();
        Session::flash('success','Profession has been deleted successfully');
       return redirect()->route('profession.index')->withMessage('Profession Deleted');
    }

    
}
