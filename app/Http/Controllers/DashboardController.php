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
use App\Services\ApplicationService;
use App\Services\RoleService;
use App\Services\UserService;
use App\Services\RegionService;
use App\Services\CityService;
use App\Services\QuestionService;

class DashboardController extends Controller
{
    protected $applicationService;
    protected $roleService;
    protected $userService;
    protected $regionSevice;
    protected $cityService;
    protected $questionService;
    
 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ApplicationService $applicationService, RoleService $roleService, UserService $userService, RegionService $regionSevice, CityService $cityService, QuestionService $questionService)
    {
        $this->middleware('auth');
        $this->applicationService = $applicationService;
        $this->roleService = $roleService;
        $this->userService = $userService;
        $this->regionSevice = $regionSevice;
        $this->cityService = $cityService;
        $this->questionService = $questionService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $documents = Application::all()->count();
        // User::where('active', 1)->count();
        // $employers = User::where('active', 1)->where('account_type', 'employer')->count();
        // $roles = Role::all()->count();

        $documents = $this->applicationService->all()->count();
        $roles = $this->roleService->all()->count();
        $users = $this->userService->getActiveUsers()->count();
        $employers = $this->userService->getActiveUsersWtihEmployerAccountType()->count();

        return view('board', compact('documents', 'roles', 'users', 'employers'), array('user' => Auth::user()));
    }

    public function CandidateDashborad()
    {
 
        // $regions = Region::all();
        // $cities = City::all();
        $regions = $this->regionSevice->all();
        $cities = $this->cityService->all();

        return view('candidate_dashboard', compact('regions', 'cities', 'users'), array('user' => Auth::user()));
    }
 
    public function OnlineTestDashboard()
    {

    // $user_latest = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
    // $question = Question::count();

    $user = $this->userService->getActiveUsers()->count();
    $question = $this->questionService->all()->count();
    $quiz = Topic::count();
    $user_latest = $this->userService->getLatestUsers();

    return view('admin.dashboard', compact('user', 'question', 'answer', 'quiz', 'user_latest'));
    }

    public function EmployeeDasboard()
    {
       return view('employee', compact('user', 'question', 'answer', 'quiz', 'user_latest'));
    }

    

}
