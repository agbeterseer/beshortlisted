<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Document;
use App\Role;
use App\User;
use App\Question;
use App\Topic; 
use App\Region;
use App\City;
use App\Profession;
use App\ProfessionMeta;
use App\Application;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Application::all()->count();
        $roles = Role::all()->count();
        $users = User::all()->count();
        return view('board', compact('documents', 'roles', 'users'), array('user' => Auth::user()));
    }


    public function CandidateDashborad()
    {
 
        $regions = Region::all();
        $cities = City::all();
        return view('candidate_dashboard', compact('regions', 'cities', 'users'), array('user' => Auth::user()));
    }



    public function OnlineTestDashboard()
    {
    $user = User::all()->count();
    $question = Question::count();
    $quiz = Topic::count();
    $user_latest = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
    return view('admin.dashboard', compact('user', 'question', 'answer', 'quiz', 'user_latest'));
    }

    public function EmployeeDasboard()
    {
       return view('employee', compact('user', 'question', 'answer', 'quiz', 'user_latest'));
    }

}
