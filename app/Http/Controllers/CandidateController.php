<?php

namespace App\Http\Controllers;
 
use App\User;
use App\DocumentProfession;
use App\Topic;
use App\Region;
use App\EmailTemplate;
use App\city;
use Auth;
use \Storage;
use Response;
use PDF;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB; 
use App\Notifications\OnlineTest;
use App\Notifications\TestVerification;
class CandidateController extends Controller
{

  public function __construct() {
      $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd('here');
       //   $users = User::where('candidate', 1)->get();
          // $user_info = DB::table('users')
          //    ->select('job_code', DB::raw('count(*) as total'))
          //    ->groupBy('job_code')->get();
  
    return view('employee_dashboard', compact('user_info'), array('user' => Auth::user()));
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
        //
    }

    public function getAllCandidates()
    {
     
     $users = User::where('candidate', 0)->get();

     $email_templates = EmailTemplate::all();
            $regions = Region::all();
            $cities = City::all();
            // compact(['users', 'regions', 'cities'])
      return view('admin.questions.all_candidates', compact('users', 'questions', 'correct_options', 'email_templates', 'regions', 'cities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $users = User::where('job_code', $id)->get();

        return view('admin.candidates.show', compact('users'), array('user' => Auth::user()));
    }

    public function showCandidateByJobCode($id)
    {
           $users = User::where('job_code', $id)->get();

        return view('admin.candidates.show', compact('users'), array('user' => Auth::user()));
    }


    // public function getAllCandidates(){

    //         $users = User::where('candidate', 1)->get();
    //         $regions = Region::all();
    //         $cities = City::all();
    //         return view('admin.candidates.all_active_candidates', compact(['users', 'regions', 'cities']), array('user' => Auth::user())); 
    // }

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
     public function downloadExcel($organization)
    { 
      $organization = Organization::find($organization);

      //  $data = DB::table('users')->where('organizations_id',$organization->id)->get(['id','firstname', 'lastname', 'middelname', 'phone_number', 'email', 'alt_phone_number', 'home_address', 'religion', 'state_of_origin', 'date_of_birth', 'resumption_date', 'marital_status', 'gender', 'city', 'spouse_name', 'spouse_employer', 'spouse_moblie_no', 'nex_surname', 'nex_other_names', 'nex_relationship', 'nex_phone_number', 'nex_home_address', 'nex_office_address', 'nex_occupation', 'nex_email_address', 'e_surname', 'e_lastname', 'e_othername', 'e_occupation', 'e_phonenumber', 'e_office_address', 'alt_e_phonenumber', 'p_height', 'p_weight', 'e_eyecolour', 'e_haircolour', 'e_bloodtype', 'e_genotype', 'e_allergies', 'e_email', 'p_marks', 'p_medical', 'p_comments', 'country', 'bank_id', 'account_name', 'account_number', 
      // 'bvn', 'tin_number', 'pension_pin', 'pfa_name', 'sort_code', 'spouse_address', 'spouse_employers_address', 'e_home_address', 'leave_days']);
     // $data = User::get()->toArray();
      $data = User::where('organizations_id', $organization->id)->get();
// 
     
        foreach ($data as $key => $employee) {
        $usersArray[] = array(
         'id'=> $employee->id,
          'FRISTNAME'=> $employee->firstname,
          'LASTNAME' => $employee->lastname,
          'MIDDLENAME' => $employee->middelname,
          'PHONE NUMBER' =>$employee->phone_number,
          'EMAIL' => $employee->email,
          'ALT PHONE NUMBER' => $employee->alt_e_phonenumber,
          'HOME ADDRESS' =>$employee->home_address,
          'RELIGION' =>$employee->religion,
         'STATE OF ORIGIN' => $employee->state_of_origin,
         'DATE OF BIRTH' => $employee->date_of_birth,
          'RESUPTION DATE' =>$employee->resumption_date,
          'MARITAL STATUS' =>$employee->marital_status,
          'GENDER' =>$employee->gender,
          'CITY' =>$employee->city,
          'SPOUSE NAME' =>$employee->spouse_name,
          'SPOUSE EMPLOYEE' =>$employee->spouse_employer,
          'SPOUSE MOBILE NUMBER' => $employee->spouse_moblie_no, 
          'SPOUSE ADDRESS' =>$employee->spouse_address,
          'SPOUSE EMPLOYEE ADDRESS' =>$employee->spouse_employers_address,
          'NEXT OF KIN SURNAME' => $employee->nex_surname,
          'NEXT OF KIN OTHER-NAMES' =>$employee->nex_other_names,
          'NEXT OF KIN RELATIONSHIP' =>$employee->nex_relationship,
          'NEXT OF KIN PHONE' =>$employee->nex_phone_number,
          'NEXT OF KIN ADDRESS' =>$employee->nex_home_address,
          'NEXT OF KIN OFFICE ADDRESS' =>$employee->nex_office_address,
          'NEXT OF KIN OCCUPATION' =>$employee->nex_occupation,
          'NEXT OF KIN EMAIL' =>$employee->nex_email_address,
          'EMERGENCY SURNAME' =>$employee->e_surname,
          'EMERGENCY LASTNAME' =>$employee->e_lastname,
          'EMERGENCY OTHERNAMES' =>$employee->e_othername,
          'EMERGENCY OCCUPATION' =>$employee->e_occupation,
          'EMERGENCY PHONE NUMBER' =>$employee->e_phonenumber,
          'EMERGENCY OFFICE ADDRESS' =>$employee->e_office_address,
          'EMERGENCY ALT PHONE' =>$employee->alt_e_phonenumber,
          'EMPLOYEE HOME ADDRESS' =>$employee->e_home_address,
          'HEIGHT' =>$employee->p_height,
          'WEIGHT' => $employee->p_weight,
          'EYE COLOUR' =>$employee->e_eyecolour,
          'HAIR COLOUR' =>$employee->e_haircolour,
          'BLOODTYPE' =>$employee->e_bloodtype,
          'GENOTYPE' =>$employee->e_genotype,
         'ALLERGIES' => $employee->e_allergies,
          'EMERGENCY EMAIL' =>$employee->e_email,
         'MARKS' => $employee->p_marks,
          'MEDICAL REPORT' =>$employee->p_medical,
          'COMMENTS' =>$employee->p_comments,
          'COUNTRY' =>$employee->country,
          'BANK' =>$employee->bank_id,
         'ACCOUNT NAME' => $employee->account_name,
          'ACCOUNT NUMBER' =>$employee->account_number,
          'BVN' =>$employee->bvn,
         'TIN' => $employee->tin_number,
          'PIN' =>$employee->pension_pin, 
          'PENSION PROVIDER' =>$employee->pfa_name,
          'BANK SORTCODE' =>$employee->sort_code,
           'lEAVE DAYS' => $employee->leave_days,

          );


        }

    //dd($usersArray);
        return \Excel::create(\Date::now()->toDateTimeString(), function($excel) use ($usersArray) {

            $excel->sheet('mySheet', function($sheet) use ($usersArray)
            {


             $sheet->fromArray($usersArray);
            });


        })->download('xlsx');
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
