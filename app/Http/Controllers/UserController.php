<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Region;
use App\City;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Hash;
use Auth;
use Image;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
	 //use RegistersUsers;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */ 
	public function __construct()
	{
		  $this->middleware('auth');
 
	// $this->middleware('role:admin');
	// $this->middleware(['permission:role-create','permission:role-edit', 'permission:role-delete']);
	}

	// function__construct()
	// {
	//     $this->middleware(['permission:role-edit','permission:role-delete']);
	// }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$user_ = Auth::user();
 
		   $users = User::all();
		   $allRoles=Role::all();

	 return view('admin.user.index',compact(['users','allRoles', 'user_']),array('user' => Auth::user()));
	}

		  public function ShowRegisterForm(Request $request)
	{

		return view('admin.user.create', array('user' => Auth::user()));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	  protected function create()
	{

		//  $user = User::create([
		//     'name' => $data['name'],
		//     'email' => $data['email'],
		//     'password' => bcrypt($data['password']),
		// ]);

		// $user->attachRole(Role::where('name','general-user')->first());

	   return view('admin.user.create', array('user_id' => Auth::user()));
	}
		  protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
		]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(array $data)
	{
		//dd($data);
	  
	   $user = User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);

		$user->attachRole(Role::where('name','general-user')->first());
	   return redirect()->route('user.index', array('user' => Auth::user()));
	}

 
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	 public function show(Request $request, User $user)
	{
		  $value = $request->session()->get('key');
	 return view('user.show',compact('user'), array('user' => Auth::user())); 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	  public function edit($id)
	{
		$user=User::find($id)->first();
		$roles = Role::all();
		

	   return view('admin.user.assignrole',compact(['user','roles']), array('user' => Auth::user())); 
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
	   
		 //get the user
		 $user=User::find($id);
		//get the user-role
		 $roles=$request->role;
		 //Delete all user corresponding role
		 DB::table('role_user')->where('user_id',$id)->delete();     
		if(is_array($roles)) {
	
		foreach ($roles as $role) {
			 $user->attachRole($role);
		   
			}
		}
	 
		Session::flash('success','Role has been Assigned successfully');

		return redirect()->route('user.index', array('user' => Auth::user()))->withMessage('Role Assigned');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
	 
	if ($id) {
	DB::table("users")->where('id',$id)->delete();
	   Session::flash('success','User has been deleted successfully');
	   return redirect()->route('user.index')->withMessage('User Deleted');
	}else{
 		Session::flash('error','Cannot Delete');
	return redirect()->route('user.index')->withMessage('User Not Deleted');
	}

	}

	public function profile(){

		return view('admin.user.profile', array('user' => Auth::user()));
	}

	public function candidate_update_avatar(Request $request){    

	 //dd($request->all()); 
	 $location = $request->location;
	 $region = $request->region;
	 $home_address = $request->home_address;
	 $phone_number = $request->phone_number;
	 $name = $request->name;

		if ($request->hasFile('avatar')) {

			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
  
			//get current user
			$user = Auth::user();
			$user->avatar = $filename;
			$user->save();
			// Session::flash('success','Image Change successfully');
			// return view('admin.user.profile', array('user' => Auth::user()))
			//  ->with('success','Image Change successfully');
 
        $city_id = DB::table('cities')->where('name',$location)->first();
        $city_id = $city_id->id;
 
			//get current user
			if($request->name){

			$user = User::find(Auth::user()->id);
			$user->name = $name;
			$user->city_id = $city_id;
			$user->region_id = $region;
			$user->contact_address = $home_address;
			$user->phone_number = $phone_number;
			$user->save();

			return redirect()->route('print.slip', $user);

			// return view('admin.user.print_slip', array('user_id' => Auth::user()))
			//  ->with('success','Image Change successfully');
			}
	   		return back()->with('error','Something went wrong:');
		}

		return redirect()->back();
	}


public function PrintVerification($user)
{
			// dd($user); 
			$user = User::find($user);
	        $regions = Region::all();
	        $region = Region::findOrFail($user->region_id);
	        $city = city::findOrFail($user->city_id);

	return view('admin.user.print_slip', compact(['user', 'regions', 'region', 'city']), array('user' => Auth::user()));
}





	public function update_avatar(Request $request){    

	//dd($request->all()); 
		if ($request->hasFile('avatar')) {

			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
  
			//get current user
			$user = Auth::user();
			$user->avatar = $filename;
			$user->save();
			  Session::flash('success','Image Change successfully');
			return view('admin.user.profile', array('user' => Auth::user()))
			 ->with('success','Image Change successfully');
		}else{

			//get current user
			if($request->firstname && $request->lastname){

			$user = User::find(Auth::user()->id);
			$user->name = $request->firstname  . ' ' . $request->lastname;
			$user->save();
			return view('admin.user.profile', array('user_id' => Auth::user()))
			 ->with('success','Image Change successfully');
			}
	   		return back()->with('error','Something went wrong:');
		}

		return view('admin.user.profile', array('user' => Auth::user()));
	}

	public function changePassword(Request $request)
	{
		  $rules = array(
                'passwordold' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
            return Response::json(array(

            'errors' => $validator->getMessageBag()->toArray(),
            
            ));
        } else {
        $passwordold = $request->passwordold;
		$password = $request->password;
		$password_confirmation = $request->password_confirmation;
		$user = User::find(Auth::user()->id);
		if(Hash::check($passwordold, $user['password']) && 
			$password == $password_confirmation){

		$user->password = bcrypt($password);
		$user->save();
		Session::flash('success','Password Changed successfully');
		// return back()->with('success','Password Changed successfully');

			 }else{
  		// Session::flash('error','Comfirm Password Must Match New Password:');
		return back()->with('error','Comfirm Password Must Match New Password:');
				 
			}

   		return view('admin.user.profile', array('user' => Auth::user()));
            // return response()->json($user);
        }


		// $passwordold = $request->passwordold;
		// $password = $request->password;
		// $password_confirmation = $request->password_confirmation;
		// $user = User::find(Auth::user()->id);

		// if(Hash::check($passwordold, $user['password']) && 
		// 	$password == $password_confirmation){

		// $user->password = bcrypt($password);
		// $user->save();
		// Session::flash('success','Password Changed successfully');
 
		// 	 }else{ 
		// return back()->with('error','Comfirm Password Must Match New Password:'); 
		// 	}
	   return view('admin.user.profile', array('user' => Auth::user()));
	}


	public function updateProfile(Request $request)
	{
 
		
	 return view('admin.user.profile', array('user' => Auth::user()));
	}


 

public function UpdateCandidateRecord(Request $request)
{
    # code...
   // dd($request->all());
    try {

        $avatar = $request->file('avatar');
        $rules = [
        '_token'=>'required',
        'avatar' =>'required|jpg,jpeg,png,gif|max:381872',
        ];

        $input = Input::only(
        '_token',
        'avatar'
        );
      

        $validator = Validator::make($input, $rules);

          // dd($request->all());
     
         if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }

   if ($request->hasFile('avatar')) {

      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
  
      //get current user
      $user = Auth::user();
      $user->avatar = $filename;
      $user->save();
         Session::flash('success-avatar','Image Change successfully');
     //\LogActivity::addToLog(Auth::user()->firstname .' Has Changed Picture.');
   // return redirect()->back();
    }

      } catch (Exception $e) {
        Session::flash('error-avatar', $e->getMessage());
      }

   return back()->with('Updated', 'Done successfully');
}


   

}
 