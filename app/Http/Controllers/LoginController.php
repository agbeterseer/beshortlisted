<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Socialite;
use App\LoginUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Input;
use Validator;
use Redirect;
class LoginController extends Controller
{

public function __construct()
{
    $this->redirectTo = url()->previous();
    $this->middleware('guest', ['except' => 'logout']);
}
 
 

public function showLoginForm()
{ 
    session(['link' => url()->previous()]);
    return view('auth.login');
}


protected function authenticated(Request $request, $user)
{
    return redirect(session('link'));
}
 
        public function login(Request $request){

      
        //     $credentials = array(
        //     'email' => $request->get('email'),
        //     'password' => $request->get('password'),
        //     'confirmed' => 1
        // );

       $rules = [
            'email' => 'required|exists:users',
            'password' => 'required'
        ];


        $input = Input::only('email', 'password');
        //dd($request->all());

      if ( ! Auth::validate(Input::only('email', 'password')))
      {
          return Redirect::back()
              ->withInput()
              ->withErrors([
                  'credentials' => 'We were unable to sign you in. check your password'
              ]);
      }
 
          if (Auth::attempt([
               'email' => $request->email,
               'password' => $request->password
          ])){
        $user = User::where('email', $request->email)->first();
        $user_id=$user->id;
         if ($user->is_admin()) {
          return redirect()->intended('board');
          }elseif(!$user->is_admin() && !$user->is_candidate()){ 
           if ($user->account_type === 'employee') { 
                return redirect()->route('show.resume'); // candidate
            }else{
              return redirect()->route('dashboard');
            }
          }
        }
          return back()->withInput()->withErrors(['email'=>'Username or password is invalid']);

     } 


         /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        //dd($provider);
        return Socialite::driver($provider)->redirect();
    }

      /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
       
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
  
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'account_type' => 'employee'
        ]);
    } 


     public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
         Auth::logout();

        Alert::success('You have been logged out.', 'Good bye!');

        return redirect('/index');
    }



     public function redirect()
    {

        return Socialite::driver('google')->redirect();
    }

    public function callback()
    { 
        dd('here');
        $user = Socialite::driver('google')->user(); 

        $authUser = $this->findOrCreateUser($user, 'google');
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }


}

 
