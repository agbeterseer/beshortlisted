<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers; 

    /**
     * Where to redirect users after registration.
     *
     *  
     */
   protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
          $this->middleware('guest');
           ///$this->middleware('auth');
    }

  public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    // public function index(Request $request, User $user)
    // {
    //     //dd($request->all());
      
    // return view('register',array('user' => Auth::user()));
    // }
 

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',  
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed', 
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    //   public function create(array $data) {

    //     // try{
    //     //         DB::transaction(function () use ($data)  {
              
    //     //             $user = User::create([
    //     //                 'name' => $data['name'],
    //     //                 'email' => $data['email'],
    //     //                 'password' => bcrypt($data['password']),
    //     //             ]);

    //     //             $user->attachRole(Role::where('name','general-user')->first());

    //     //             Session::flash('success','User has been Created successfully');

    //     //              return $user;

    //     //      });

    //     //  } catch (\Exception $e) {
    //     //    return redirect()->back()
    //     //       ->withErrors(['error' => $e->getMessage()]);
    //     // }

    // }

    public function create(array $data) { 
 
    //dd($data);

      $user = User::firstOrNew(['email'=>$data['email']]);
      $user->name = $data['name'];
      $user->password = bcrypt($data['password']);
      $user->account_type = $data['account_type'];
      $user->save();


      //create([ 'name' => $data['name'], 'email' => $data['email'], 'password' => bcrypt($data['password']), 'account_type' => $data['account_type']]);
      // $user = User::findOrFail($user->id);
      // $user->firstname = $data['firstname'];
      // $user->lastname = $data['lastname'];
      // $user->account_type = $data['account_type'];
      // $user->save(); 
      // registering client
      if ($data['account_type'] === 'employer') {
    $client = Client::firstOrNew(['name'=> $data['firstname']]);
    $client->created_at = Carbon::now();
    $client->user_id = $user->id;
    $client->save();




      }

     $recruit_profile_pix = DB::table('recruit_profile_pixs')->insert(['user_id' => $user->id, 'order' => 1, 'status' => 1, 'created_at' => $this->returnCurrentTime()]);

 
     return $user; 

    }




}
