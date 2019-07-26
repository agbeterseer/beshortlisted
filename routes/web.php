<?php
use Illuminate\Support\Facades\Input as Input;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\Post;
use App\Menu;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
 
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/', 'HomeController@welcome');
Route::get('/vue', function () {
	return view('testhome');
  });
Route::get('/home', 'HomeController@home')->name('home');
Auth::routes();

Route::get('/pricing', [
	'as' => 'pricing',
	'uses' => 'HomeController@show_price'
]);
Route::get('/terseer-agbe', function () {
  return view('post');
})->where('any', '.*');

Route::post('/test', [
	'as' => 'send.email',
	'uses' => 'HomeController@sendEmail'
]);

Route::get('/sign-up', [
	'as'=> 'sign.up',
	'uses'=> 'HomeController@SingUp'
]);
Route::get('/register/account-creation-success', [
	'as'=> 'create_account.success',
	'uses'=> 'HomeController@account_creation_success'
]);

Route::get('/employer/verify-account/{confirmationCode}/{account_type}', 
		[
			'as' => 'confirmation_path',
			'uses' => 'HomeController@confirm',
		]);
Route::get('/register/sign-up/verification-link/{account_type}', [
	'as'=> 'employer.activeted',
	'uses'=> 'HomeController@activeted'
]);
Route::get('/employer/sign-up', [
	'as'=> 'employer.sigup',
	'uses'=> 'HomeController@EmployerSignUp'
]);
Route::get('/employee/sign-up', [
	'as'=> 'employee.sigup',
	'uses'=> 'HomeController@EmployeeSignUp'
]);

Route::post('register-employee', [
	'as'=> 'register.employee',
	'uses'=> 'HomeController@RegisterEmployee'
]);
Route::post('employer-sign-up', [
	'as'=> 'employer.postsigup',
	'uses'=> 'HomeController@RegisterEmployer'
]);
Route::get('/industries-with-job-opening/{id}', [
	'as'=> 'job_opening',
	'uses'=> 'HomeController@getJobsByIndustries'
]);
Route::get('/post-page/{id}', [
	'as'=> 'single.page',
	'uses'=> 'HomeController@vieSinglePage'
]);
Route::get('/terms-of-use/',  [
	'as' => 'terms.use',
	'uses' => 'HomeController@TermsOfUse'
]);
Route::get('/rhizome-admin', function () {
    return view('backend-admin');
});
Route::get('/help-center', function () { 
    return view('helpcenter');
});
Route::get('/page/{page}', [
'as' => 'single.page',
'uses' => 'HomeController@showSinglePage'
]);
Route::get('/guidelines', [
	'as'=> 'guidelines',
	'uses'=> 'HomeController@guidelines'
]);
 Route::get('/helpcenter', [
	'as'=> 'helpcenter',
	'uses'=> 'HomeController@helpcenter'
]);
//'/onlinetest_link/link/'. $this->user->test_id . '/candidate/'. $this->user->id
Route::get('/index/candidate-information', [
	'as' => 'candidates',
	'uses' => 'HomeController@employee'
	]);
Route::get('/index/employer-information', [
	'as' => 'employer_infor',
	'uses' => 'HomeController@employer'
	]);
Route::get('/index/contact-information', [
	'as' => 'contactus',
	'uses' => 'HomeController@contact'
	]);
Route::get('/index/about-us', [
	'as' => 'aboutus',
	'uses' => 'HomeController@aboutus'
	]);
Route::post('contactus', [
	'as' => 'post.message',
	'uses' => 'HomeController@addContactUs'
]);
Route::get('/jobs/job-listing-form/{code}', [
	'as' => 'list.job',
	'uses' => 'HomeController@ShowJobFilterForm'
	]);
Route::get('/job/all-jobs', [
	'as' => 'all.jobs',
	'uses' => 'HomeController@AllJobs'
	]);
Route::get('/email-subscription', [
	'as' => 'subscribe',
	'uses' => 'HomeController@SubscribeToNewsletter'
	]);
Route::get('/policy-document', [
	'as' => 'display.policy',
	'uses' => 'HomeController@DisplayPolicy'
	]);
Route::get('/page/policy-document/{code}', [
	'as' => 'policy.document',
	'uses' => 'HomeController@PreivewPolicy'
	]);
Route::get('/job/job-descriptions/{id}', [
	'as' => 'job.description',
	'uses' => 'HomeController@JobDetails'
	]);
Route::get('/job/industries', [
	'as' => 'list_industries',
	'uses' => 'HomeController@AllIndustries'
	]);
Route::get('/tickets', [
	'as' => 'ticket_page',
	'uses' => 'TicketController@index'
]);
// Auth::logout()
Route::get('/onlinetest_link/link/{id}/candidate/{user}',  'IndexController@beginTest');
Route::get('/test/start_test-{id}-candidate-{user}',[
	'as' => 'start.test',
	'uses' =>'TestsController@testInfoPage']);
// custome routes ['middleware' => 'auth'],
	Route::get('/login', [
		'as' => 'auth.login',
		'uses' =>'LoginController@showLoginForm'
		]
		);
 
	Route::post('/login',[
	'uses'=> 'LoginController@login',
	'as'=> 'login'
	]);
	Route::get('/logout',[
	'uses'=> 'LoginController@logout',
	'as'=> 'logout'
	]);
Route::get('auth/{provider}', 'LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'LoginController@Callback');
// Route::get('auth/{provider}', 'Auth\LoginController@socialLogin')
 //   ->where(['provider' => 'facebook|google']);
 //   Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback2')
 //   ->where(['provider' => 'facebook|google']);
	Route::group(array('before' => 'auth', 'after' => 'no-cache', 'middleware' => 'web'),  function (){
	Route::get('/employer/create-card', [
		'as' => 'create.card',
		'uses' => 'SettingController@CreateCard' 
	]);
	Route::post('add-card', [
		'as' => 'add.card',
		'uses' => 'SettingController@AddCard'
	]);

Route::get('/pending-tickets', [
	'as' => 'admin.tickets',
	'uses'=> 'TicketController@adminShowTickets'
]);
Route::get('/open-support-ticket-{id}', [
	'as' => 'open.ticket',
	'uses' => 'TicketController@openTicket'
]);
Route::post('/closed-ticket', [
	'as' => 'closed.ticket',
	'uses' => 'TicketController@closedTicket'
]);

	Route::post('/add-page-information', [
		'as' => 'add.page_infor',
		'uses' => 'PostController@AddPageInfor'
	]);
	Route::get('/show-information', [
		'as' => 'page_infor',
		'uses' => 'PostController@showPageInforForm'
	]);
//UpdatePageInfor
	Route::post('/update-page-information', [
		'as' => 'update.page',
		'uses' => 'PostController@UpdatePageInfor'
	]);

	Route::get('/settings/list-contact-form', [
		'as' => 'show.contacts',
		'uses'=> 'SettingController@listContactForms'
	]);
	Route::get('/settings/publish-contact-form/{id}', [
		'as' => 'publish.contact',
		'uses'=> 'SettingController@PublishContactForm'
	]);
	Route::get('/settings/show-contact-form', [
		'as' => 'create.contact',
		'uses'=> 'SettingController@showContactForm'
	]); 
	Route::post('add-contact', [
		'as' => 'add.contact',
		'uses'=> 'SettingController@addContact'
	]);
	Route::post('update-contact', [
		'as' => 'update.contact',
		'uses'=> 'SettingController@updateContact'
	]);
	Route::post('delete-contact', [
		'as' => 'delete.contact',
		'uses'=> 'SettingController@deleteContact'
	]);
	Route::get('/settings/edit-contact-form/{id}', [
		'as' => 'edit.contact',
		'uses'=> 'SettingController@editContact'
	]); 
	Route::get('/menu/link_to_page/{id}', [
		'as' => 'link_to_page',
		'uses'=> 'MenuController@linkMenuForm'
	]);
	Route::post('/pages/add-page-content', [
		'as' => 'add_content',
		'uses' => 'PostController@AddPageContent'
	]);
	Route::get('/index','HomeController@index')->name('index')->middleware('auth');
	Route::get('/employer/dashboard', [
			'as' => 'dashboard',
			'uses' => 'ResumeController@employer'
		]);
	Route::get('/board', 'DashboardController@index')->name('board')->middleware('auth');	
 	Route::get('/index/employee_dashboard', [
 		'as' => 'candidate',
 		'uses' => 'CandidateController@index'
 		]); 
 	Route::get('/user/profile', 'UserController@profile')->name('profile')->middleware('auth');
	Route::post('/user/profile', 'UserController@update_avatar')->middleware('auth');
	Route::post('/verify_candidate', 'UserController@candidate_update_avatar')->middleware('auth');
	Route::get('/print_out-{id}', [
			'as' => 'print.slip',
			'uses' => 'UserController@PrintVerification'
		]);
	Route::post('/user/profileupdate', 'UserController@updateProfile');
	Route::post('/user/password', [
	'uses' => 'UserController@changePassword',
	'as' => 'user.changePassword'
		])->middleware('auth');
	Route::get('/profession',[
		'as' => 'profession.index',
		  'middleware' => 'role:admin',
		// 'middleware'=>(['role:admin','role:superuser','role:general-user']),
		'uses' => 'ProfessionController@index'
	])->middleware('auth');
	Route::get('/admin',[
		'as' => 'admin.index',
		'middleware' => 'role:admin',
		'uses' =>function(){
		return view('admin.index');
		}
	])->middleware('auth');
	Route::get('/user',[ 
		'as' => 'user.index',
		  'middleware' => 'role:admin',
		// 'middleware'=>(['role:admin','role:superuser','role:general-user']),
		'uses' =>function(){
		return view('user.index');
	}
	])->middleware('auth');
	Route::get('/role',[
		'as' => 'role.index',
		 'middleware' => 'role:admin',
		// 'middleware'=>(['role:admin','role:superuser','role:general-user']),
		'uses' =>function(){
		return view('role.index');
	}
	]);
	Route::get('/region',[
		'as' => 'region.index',
		 'middleware' => 'role:admin',
		// 'middleware'=>(['role:admin','role:superuser','role:general-user']),
		'uses' =>function(){
		return view('region.index');
	}
	])->middleware('auth');
	Route::get('/document/search', [
		'uses' => 'DocumentController@show_search',
		'as' => 'document.search_category'
		])->middleware('auth');
	Route::post('/document/search', [
		'uses' => 'DocumentController@post_search',
		'as' => 'document.search_category'
		])->middleware('auth');
	Route::get('/document/uploadcv', 'DocumentController@show_upload');
	Route::post('/document/uploadcv',[
		'uses'=>'DocumentController@handleUploadcv',
	 	'as'=> 'document.uploadcv'
	 ])->middleware('auth');
	// show search
	Route::post('/document/custome-search', [
		'as' => 'document.custome_search',
		'uses' => 'DocumentController@searchDocumentByRegionAndProfessionAndYearsOfExperience'
		]);
	Route::get('/document/get_single_document/{id}',[
	'as' => 'get_single.document',
	'uses' => 'DocumentController@ViewSingleDocument'
		]);
	// filter by city routes
	Route::post('document/city', [
		'uses'=>'DocumentController@searchCandidatesByCity',
		'as'=> 'document.filter_by_city'
		]);
	Route::get('document/city', [
		'uses'=>'DocumentController@view_filter_by_city',
		'as'=> 'document.view_filter_by_city'
		]);
	// filter by Years Of Experience
 	Route::post('document/years', [
		'uses'=>'DocumentController@searchCandidatesByYearsOfExperience',
		'as'=> 'document.filter_by_yoe'
		]);
	Route::get('document/years', [
		'uses'=>'DocumentController@view_filter_by_years',
		'as'=> 'document.view_filter_by_yoe'
		]);
		// filter by Region 
	Route::post('/region/city', [
		'uses'=>'RegionController@getRegion',
		'as'=> 'region.filter_by_region'
		]);
	Route::get('/region/city',  [
			'uses'=>'RegionController@getRegion',
			'as' => 'region.getRegion'
			]);
	//filter by Professions
	Route::get('/document/professions',  [
			'uses'=>'DocumentController@view_filter_by_professions',
			'as' => 'document.view_filter_by_professions'
			]);
	Route::post('/document/professions', [
		'uses'=>'DocumentController@searchCandidatesByProfession',
		'as'=> 'document.filter_by_professions'
		]);
	Route::get('/document/cv', [
		'uses' => 'DocumentController@getFile',
		'as' => 'document.getFile'
		]);
	Route::post('/document/cv', [
		'uses' => 'DocumentController@getFile',
		'as' => 'document.index'
		])->middleware('auth');
	Route::get('/index/candidates-pool/', [
		'as' => 'list.all',
		'uses' => 'DocumentController@allCandidates'
		]);
	Route::get('/document/upload', [
		'uses' => 'DocumentController@showFormCSV',
		'as' => 'document.uploadfromcsv'
		]);
	Route::post('/document/upload', [
		'uses' => 'DocumentController@importFromCSV',
		'as' => 'document.importFromCSV'
		]);
	Route::get('importExport', [
		'uses' => 'BackupController@importExport',
		'as' => 'backupsys.importExport'
		]);
	Route::get('downloadCandidateExcel/{organisation}', 'AdminController@downloadExcel');
	Route::get('downloadExcel/{type}', 'BackupController@downloadExcel');
 	Route::get('backUpDocumentProfession/{type}', 'BackupController@backUpDocumentProfession');
	Route::get('document/search/{region_id}',
	array('as'=>'region.search','uses'=>'IndexController@getCitiesByRegioinAjax')); 
	Route::get('backup', [
	    	'uses' =>  'BackupController@index',
	    	'as' =>'backupsys.backups' 
	    	])->middleware('auth');
	Route::get('/advance-search/', [
		'as' => 'search.advance_search',
		'uses' =>'SearchController@index'
		])->middleware('auth');
	Route::get('lob/logActivity', [
	'as' => 'log.activity',
	'uses' => 'HomeController@logActivity'
	]);
	Route::post('make-red-{id}', [
		'as' => 'make.red',
		'uses' => 'ShortlistController@RedCV' 
		]);
	Route::post('make-blue-{id}', [
		'as' => 'make.blue',
		'uses' => 'ShortlistController@BlueCV' 
		]);
	Route::post('make-green-{id}', [
		'as' => 'make.green',
		'uses' => 'ShortlistController@GreenCV' 
		]);
	Route::post('make-yellow-{id}', [
		'as' => 'make.yellow',
		'uses' => 'ShortlistController@YellowCV' 
		]);
 	Route::post('make-black', [
		'as' => 'make.black',
		'uses' => 'ShortlistController@BlackCV' 
		]);
 	Route::get('shortlist', [
		'as' => 'shortlist.index',
		'uses' => 'ShortlistController@index' 
		]);
 	Route::post('get-red', [
		'as' => 'get.red',
		'uses' => 'ShortlistController@FilterByRed' 
		]);
	Route::post('get-blue', [
		'as' => 'get.blue',
		'uses' => 'ShortlistController@FilterByBlue' 
		]);
	Route::post('get-green', [
		'as' => 'get.green',
		'uses' => 'ShortlistController@FilterByGreen' 
		]);
	Route::post('get-yellow', [
		'as' => 'get.yellow',
		'uses' => 'ShortlistController@FilterByYellow' 
		]);
Route::get('get-unsorted-{id}', [
		'as' => 'get.unsorted',
		'uses' => 'ShortlistController@FilterByUnsorted' 
		]);
Route::get('tag', [
		'as' => 'tag.index',
		'uses' => 'TagController@index' 
		]);
Route::post('black-list-{id}',[
	'as' => 'blacklist.cv',
	'uses' => 'DocumentController@BlackListCV'
	]);
 
Route::post('/Savepolicy', [
	'as' => 'save.policy',
	'uses' => 'PolicyController@Savepolicy'
	]);
Route::post('/Updatepolicy', 'PolicyController@Updatepolicy');
Route::get('/policy_preview/{code}', [
	'as' => 'preview.code',
	'uses' => 'PolicyController@PreivewPolicy'
	]);
Route::get('/admin_online_dashboard', [
 'as' => 'test.dashborad',
 'uses' => 'DashboardController@OnlineTestDashboard'
 ]);
Route::get('/admin/candidates/', [
	'as' => 'all.candidtates',
	'uses' => 'CandidateController@getAllCandidates'
]);
Route::get('/cbt_update_record-form', [
	'as' => 'cbt.update',
	'uses' => 'UserController@UpdateCandidateRecordForm'
	]);
Route::post('/UpdateCandidateRecord', 'UserController@UpdateCandidateRecord');
Route::get('/admin/candidate/bycode-{id}', 'CandidateController@showCandidateByJobCode');
Route::get('/admin/candidate/active-candidate', 'CandidateController@getAllCandidates');
Route::resource('/admin/settings', 'SettingController');
Route::post('sort_by_category', [
		'as' => 'sort.criteria',
		'uses' => 'ShortlistController@SortByCategory' 
		]);
Route::get('/sort_by_category/{id}/{code}', [
		'as' => 'sort.criteria',
		'uses' => 'ShortlistController@SortByCategory' 
		]);
Route::get('custom_search-{years_of_experience}/{profession}/{location}/{sort_category}', [
	'as' => 'c.search',
	'uses' => 'SearchController@customSearch'
	]);
 
Route::post('custom_search', [
	'as' => 'c.search',
	'uses' => 'SearchController@customSearch'
	]);
 
	Route::get('/register-users', 'Auth\RegisterController@create');
 	Route::resource('/emails', 'EmailTemaplateController');
  	Route::resource('/admin/all_reports', 'AllReportController');
  	Route::resource('/admin/top_report', 'TopReportController');
  	Route::resource('/admin/candidate/verified', 'CandidateController');
    Route::resource('tests', 'TestsController');
    Route::resource('topics', 'TopicsController');
    Route::resource('sendlink', 'SendLinkController');
    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::resource('results', 'ResultsController');
    Route::resource('/admin/questions', 'QuestionsController');
  	Route::post('/admin/questions/import_questions', 'QuestionsController@importExcelToDB')->name('import_questions');
  	Route::post('/admin/questions/import_candidates', 'QuestionsController@importCandidatesExcelToDB')->name('import_candidates');
  
  	Route::post('/admin/sendlink', 'SendLinkController@SendLinkToMultipleCandidates');
  	Route::post('/admin/sendVerification_link', 'SendLinkController@SendVerificaitonLinkToMultipleCandidates');
  	Route::post('/extract_content', [
  		'as' => 'extract.word',
  		'uses' => 'SearchController@extract_docx'
  		]);
   // Route::resource('roles', 'RolesController');
Route::resource('/admin/topics', 'TopicController');
Route::resource('/admin/topics/send_test_links', 'SendLinkController');
  
Route::get('/tests',[
        'as' => 'tests.index',
        'uses' => 'TestsController@index'
    ]);
Route::get('/sendlink-{id}', [
 	'as' => 'send.link',
 	'uses' => 'SendLinkController@sendTestLink'
 	]);
Route::post('add-industry', [
	'as' => 'add.industry',
	'uses' => 'SettingController@AddIndustry'
	]);
Route::post('update-industry', [
	'as' => 'update.industry',
	'uses' => 'SettingController@UpdateIndustry'
	]);
Route::get('/job-settings', [
	'as' => 'show.industry_settings',
	'uses' => 'SettingController@showIndustrySettings'
	]);
Route::get('/resume/add-work-history', [
	'as' => 'show_work.form',
	'uses' => 'ResumeController@ShowWorkExperienceForm'
	]);
Route::post('assign-profession-to-industry', [
	'as' => 'assing.profession',
	'uses' => 'SettingController@AssignProfessionToIndustry'
	]);
Route::post('add-work-history', [
	'as' => 'add.work_history',
	'uses' => 'ResumeController@AddWorkExperience'
	]);
Route::get('/index/resume/work_history-{code}-{id}', [
	'as'=>'show.work_history',
	'uses' => 'ResumeController@SowUpdateWorkHistoryForm'
	]);
Route::post('update-work_history', [
	'as' => 'update.work_history',
	'uses' => 'ResumeController@UpdateWorkHistory'
	]);
Route::get('/delete/work_experience-{id}/{code}', [
	'as' => 'delete.work',
	'uses' => 'ResumeController@DeleteWorkExperience'
	]);
Route::post('add-education', [
	'as' => 'add.education',
	'uses' => 'ResumeController@AddEducation'
	]);
Route::get('/candidate/create-education-form/{id}', [
	'as' => 'show.education_form',
	'uses' => 'ResumeController@CreateEducationForm'
	]);
Route::post('update-education', [
	'as' => 'update.education',
	'uses' => 'ResumeController@UpdateEducation'
	]);
Route::get('/update_education_form-{code}-{id}', [
	'as' => 'show.update',
	'uses' => 'ResumeController@ShowEditEducation'
	]);
Route::get('/candidate/delete-education/{id}', [
	'as' => 'delete.education',
	'uses' => 'ResumeController@DeleteEducation'
	]);
Route::post('add-skills', [
	'as' => 'add.skill',
	'uses' => 'ResumeController@AddSkills'
	]);
Route::post('edit-skill', [
	'as' => 'update.skill',
	'uses' => 'ResumeController@UpdateSkill'
	]);
Route::get('/index/resume-{id}-update-skill', [
	'as' => 'update_skill.form',
	'uses' => 'ResumeController@UpdateslskillForm'
	]);
Route::get('/index/resume/delete-{code}-skill-{id}', [
	'as' => 'delete.skill',
	'uses' => 'ResumeController@deleteSkill'
	]);
Route::get('/employer/show/email', 'EmailTemaplateController@PreviewEmail');
Route::post('add-career-summary', [
	'as' => 'add.career_summary',
	'uses' => 'ResumeController@AddCareer'
	]);
Route::post('update-career-summary', [
	'as' => 'update.career_summary',
	'uses' => 'ResumeController@UpdateCareer'
	]);
Route::get('/employer/candidates-pool', [
	'as' => 'candidates.pool',
	'uses' => 'DocumentController@Add'
	]);
 
Route::get('/candidates/job-details/{id}', [
	'as' => 'apply.job',
	'uses' => 'ResumeController@JobApplicationForm'
	]);
Route::get('/candidate/job/application-success/{id}', [
	'as' => 'application.success',
	'uses' => 'ResumeController@ApplicationSuccess'
	]);
	Route::get('candidate/search/{region_id}',
	array('as'=>'edit_profile.index','uses'=>'ResumeController@getCitiesByRegioinAjax')); 
Route::get('/candidate/job/application/{resume}/stage-one/{id}/{check}', [
	'as' => 'stage_one.application',
	'uses' => 'ResumeController@StageOneJobApplication'
	]);
Route::post('apply-for-job', [
	'as' => 'make.application',
	'uses' => 'ResumeController@ApplyForAJob'
	]);
Route::post('add-profile', [
	'as' => 'add.profile',
	'uses' => 'ResumeController@AddProfile'
	]);
Route::post('update-profile', [
	'as' => 'update.candidate_profile',
	'uses' => 'ResumeController@UpdateCandidateProfile'
	]);
Route::get('/candidate/edit-profile-form/{id}/{resume_id}',[
	'as' => 'edit.profile',
	'uses' => 'ResumeController@EditProfileForm'
	]);
Route::post('add-caption', [
	'as' => 'add.caption',
	'uses' => 'ResumeController@AddCaption'
	]);
Route::post('update-caption', [
	'as' => 'update.caption',
	'uses' => 'ResumeController@UpdateCaption'
	]);
Route::post('add-qualification', [
	'as' => 'add.qualification',
	'uses' => 'SettingController@AddQaulification'
	]);
Route::get('/index/resume/show-caption_form', [
	'as' => 'show.cation',
	'uses' => 'ResumeController@ShowCaptionForm'
	]);
Route::get('/index/resume', [
	'as' => 'show.resume',
	'uses' => 'ResumeController@ShowResume'
	]);
Route::get('/index/resume-{id}', [
	'as' => 'show.resume_id',
	'uses' => 'ResumeController@ShowResume'
	]);
Route::get('/index/resume/{resume_id}', [
	'as' => 'get.resume',
	'uses' => 'ResumeController@SelectResume'
	]);
// Route::get('/index/resume', [
// 	'as' => 'show.resume_id',
// 	'uses' => 'ResumeController@ShowResume'
// 	]);
Route::get('/index/resume/{code}/career_summary/{id}', [
	'as' => 'career.summary',
	'uses' => 'ResumeController@ShowCareerForm'
	]);
Route::get('/index/resume/certificate', [
	'as' => 'show.certificate',
	'uses' => 'ResumeController@ShowAddCertificateForm'
	]);
Route::get('/index/resume/certificate/{resume_id}',[
		'as' => 'edit.certificate',
		'uses' => 'ResumeController@ShowUpdateCertificateForm'
	]);
Route::post('update-certificate', [
	'as' => 'update.certificate',
	'uses' => 'ResumeController@UpdateCertificate'
	]);
Route::post('add-certificate', [
	'as' => 'add.certificate',
	'uses' => 'ResumeController@AddCertificate'
	]);
Route::get('/index/resume/delete/certifica-{id}', [
	'as' => 'delete.certification',
	'uses' => 'ResumeController@DeleteCertification'
	]);
Route::post('add-personal-information', [
	'as' => 'personal.information',
	'uses' => 'ResumeController@AddPersonalInformation'
	]);
Route::get('/index/resume/{resume_id}/personal_information', [
	'as' => 'update.pinformation',
	'uses' => 'ResumeController@ShowUpdatePersonalInformationForm'
	]);
Route::post('update/personal_information', [
	'as' => 'update.pfform',
	'uses' => 'ResumeController@UpdatePersonalInformation'
	]);
Route::post('status_change-{id}',[
	'uses' => 'TagController@changeStatus',
	'as' => 'change.status'
	]);
	
Route::get('/employer/shortlist-candidates', [
	'as' => 'short.list',
	'uses' => 'ShortlistController@EmployerShortlistPage'
	]);
Route::get('/employer/shortlist-candidate/{id}', [
	'as' => 'shortlist.candidate',
	'uses' => 'ResumeController@ShowCandidateCV'
	]); 
Route::get('/employer/candidate/resume/{id}/{candidate_id}', [
	'as' => 'candidate.resume',
	'uses' => 'ResumeController@AdminResumeById' 
	]); 
Route::get('/index/application-history', [
		'as' => 'application.history',
		'uses' => 'TagController@ApplicationHistoryPage'
	]);
// Route::get('/employer/dashboard-profile-setting', [
// 	'as' => 'show_employer.profile',
// 	'uses' => 'ShortlistController@EmployerShortlistPage'
// 	]);
	Route::get('employer/city-region-search/{region_id}',
	array('as'=>'employer_city_region','uses'=>'ResumeController@getCitiesByRegioinAjax')); 
// Route::post('employer-add-profile', [
// 	'as' => 'add.profile',
// 	'uses' => 'EmployerController@EmployerAddprofile'
// 	]);
//add.profile
Route::get('/employer/display-image-upload/{id}', [
		'as' => 'upload.images',
		'uses' => 'EmployerController@showImageForm'
		]);
Route::post('employer-upload-image', [
	'as' => 'post.image',
	'uses' => 'EmployerController@UpdateProfilePix'
	]);
Route::get('/employer-select-image',[
	'as' => 'selete.image',
	'uses' =>  'EmployerController@SelectionImage'
	]);
Route::get('/employer/display-job-detail-sort-{id}', [
	'as' => 'display.sort',
	'uses' => 'TagController@DisplayRecordsForSorting'
	]);
Route::get('/employer/edit-jobspost-{id}', [
	'as' => 'edit.jobpost',
	'uses' => 'TagController@ShowEditJobsForm'
	]);
Route::get('/index/featured-jobs/', [
	'as' => 'featured.jobs',
	'uses' => 'TagController@GetfeaturedJobs'
	]);
Route::post('employee-upload-image', [
	'as' => 'employee_postimage',
	'uses' => 'EmployerController@UpdateProfilePix'
	]);
Route::get('/index/display-profile-pix', [
	'as' => 'display.pix',
	'uses' => 'ResumeController@showImageForm'
	]);
Route::post('/employer-update-jobpost', [
	'as' => 'e_update.post',
	'uses' => 'TagController@UpdateJobPost'
	]);
Route::get('/employer/manage-jobs', [
	'as' => 'manage.jobs',
	'uses' => 'TagController@ShowManageJobs'
	]);
Route::get('/employer/post-jobs', [
	'as' => 'post.jobs',
	'uses' => 'TagController@PostJobs'
	]);

Route::post('/tag/save-job', 'TagController@SaveJob');
Route::get('/employer/job/save-to-draft/{id}', [
	'as' => 'show.draft',
	'uses' => 'TagController@showSaveToDraft'
	]);
Route::get('/tag/reivew/{id}', [
	'as' => 'review.jobs',
	'uses' => 'TagController@ReivewJob'
	]);
Route::post('employer-job', [
	'as' => 'save.draft',
	'uses' => 'TagController@SaveDraft'
	]);
Route::get('/job/job-listing', [
	'as' => 'job.listing',
	'uses' => 'HomeController@JobListing'
	]);
Route::get('/index/resume/print/{id}', [
	'as' => 'print.resume',
	'uses' => 'ResumeController@PrintResume'
	]);
 
Route::get('/job/job-detail/{code}', [
	'as' => 'job.details',
	'uses' => 'TagController@JobDetail'
	]);
Route::get('/employer/job-post-successfull-{id}', [
	'as' => 'jp.success',
	'uses' => 'TagController@JPSuccess'
	]);
Route::post('/tag/approve-job-post/{id}', [
	'as' => 'approve.job',
	'uses' => 'TagController@approvejobpost'
	]);
Route::post('tag/make-featured/{id}', [
	'as' => 'make.featured',
	'uses' => 'TagController@MakeFeaturedJob'
]);
Route::post('/tag/turn-off-job-post/{id}', [
	'as' => 'turnoff.job',
	'uses' => 'TagController@TurnOfJob'
	]);
Route::post('/tag/blacklist-job-post/{id}', [
	'as' => 'blacklist.job',
	'uses' => 'TagController@BlackListJobPost'
	]);
Route::get('/templates', [
		'as'=> 'display.templates',
		'uses' => 'HomeController@DisplayTemplates'
		]);
Route::get('/tabular', [
		'as' => 'table.show',
		'uses'=> 'ResumeController@TabularResume'
		]);
Route::get('/classic', [
		'as' => 'classic.show',
		'uses'=> 'ResumeController@Classic'
		]);
Route::get('/iit', [
		'as' => 'iit.show',
		'uses'=> 'ResumeController@IIT'
		]);
 
	Route::get('/employer-make-payment-{id}', [
		'as' => 'employer.payment',
		'uses' => 'EmployerController@Payment'
		]);
	Route::get('/employer-upgrade-payment-{id}', [
		'as' => 'upgrade.payment',
		'uses' => 'EmployerController@DisplayPaymentForUpgrade'
		]);
Route::get('/employer/upgrade-package/{id}', [
	'as' => 'upgrade.package',
	'uses' => 'PackagesController@UpgradePackageInfo'
	]);
Route::post('/employer-make-panyment', [
	'as' => 'make.payment',
	'uses' => 'PaymentController@employerPayment'
	]);
Route::get('/employer/packages', [
	'as' => 'employer.packages',
	'uses' => 'EmployerController@Packages'
	]);
Route::get('/standard', [
	'as' => 'standard.show',
	'uses' => 'ResumeController@Standard'
	]);
Route::post('/employer/make-package-upgrade', [
	'as' => 'employer.make_upgrade',
	'uses' => 'PaymentController@makeUpgrade'
	]);
Route::get('/professional', [
	'as' => 'professional.show',
	'uses' => 'ResumeController@Professional'
	]);
Route::get('/professional2', [
	'as' => 'professional2.show',
	'uses' => 'ResumeController@Professional2'
	]);
Route::get('/twocolumn', [
	'as' => 'column.show',
	'uses' => 'ResumeController@TwoColumns'
	]);
Route::get('/leftphoto', [
	'as' => 'left.show',
	'uses' => 'ResumeController@LefPhoto'
	]);
 
Route::get('/rightphoto', [
	'as' => 'right.show',
	'uses' => 'ResumeController@RightPhoto'
	]);
 Route::get('/traditional',[
 	'as' => 'traditional.show',
 	'uses' => 'ResumeController@Traditional'
 	]);
 Route::get('/classic-experienced', [
 	'as' => 'show.classic2',
 	'uses' => 'ResumeController@ClassicExperienced'
 	]);
 Route::get('/twocolumns2', [
 	'as' => 'show.twocolumns2',
 	'uses' => 'ResumeController@TwoColumns2'
 	]);
 Route::get('/standard2', [
 	'as' => 'show.standard2',
 	'uses' => 'ResumeController@Standard2'
 	]);
 Route::get('/iconic', [
 	'as' => 'show.iconic',
 	'uses' => 'ResumeController@Iconic'
 	]);
 Route::get('/elegant', [
 	'as' => 'show.elegant',
 	'uses' => 'ResumeController@Elegant'
 	]);
 Route::get('/boldheader', [
 	'as' => 'show.header',
 	'uses' => 'ResumeController@BoldHeader'
 	]);
 Route::get('/leftside', [
 	'as' => 'show.leftside',
 	'uses' => 'ResumeController@LeftSide'
 	]);
 Route::get('/rightside', [
 	'as' => 'show.rightside',
 	'uses' => 'ResumeController@RightSide'
 	]);
 Route::get('/stylishred', [
 	'as' => 'show.rightside',
 	'uses' => 'ResumeController@StylishRed'
 	]);
 Route::get('/hexagonal', [
 	'as' => 'show.rightside',
 	'uses' => 'ResumeController@Hexagonal'
 	]);
 Route::get('/creative_red', [
 	'as' => 'creative.red',
 	'uses' => 'ResumeController@CreativeRed'
 	]);
Route::get('/blue_arc', [
	'as' => 'blue.arc',
	'uses' => 'ResumeController@BlueArc'
	]);
Route::get('/cards', [
	'as' => 'show.cards',
	'uses' => 'ResumeController@Cards'
	]);
Route::get('/rightpane', [
	'as' => 'show.right_pane',
	'uses' => 'ResumeController@RightPane'
	]);
Route::get('/blue-yellow', [
	'as' => 'show.by',
	'uses' => 'ResumeController@BlueYellow'
	]);
Route::post('add-award', [
	'as' => 'add.award',
	'uses' => 'ResumeController@AddAward'
	]);
Route::get('/edit-award-{id}', [
	'as' => 'edit.award',
	'uses' => 'ResumeController@ShowUpdateAward'
	]);
Route::post('update-ward', [
	'as' => 'update.ward',
	'uses' => 'ResumeController@UpdateAward'
	]);
 
   
Route::get('/employer/candidates-listing', [
	'as' => 'candidate.list',
	'uses' => 'EmployerController@ListCandidates2'
	]);
Route::get('/employer/job/applicants/{id}', [
	'as' => 'get.applicants_byid',
	'uses' => 'TagController@GetCandidatesByJobApplication'
	]);
Route::post('/employer/add-property-plan', [
	'as' => 'add.property',
	'uses' => 'PackagesController@AddProperty'
	]);
Route::get('/plan/property/{id}', [
	'as' => 'get.property',
	'uses' => 'PackagesController@showPropertyForm'
	]);
Route::post('/plan/property/delete', [
	'as' => 'delete.properties',
	'uses' => 'PackagesController@deleteProperty'
	]);
Route::post('/plan/property/edit', [
	'as' => 'update.property',
	'uses' => 'PackagesController@UpdateProperty'
	]);
// Route::post('test-sript', [
// 	'as' => 'test.me',
// 	'uses' => 'TagController@searchConditions'
// 	]);
Route::get('/menu', [
'as' => 'admin.show_menu',
'uses' => 'MenuController@index'
]);
Route::get('/menu-show-submenu-{id}', [
'as' => 'menu.show_submenu',
'uses' => 'MenuController@ShowAssignSubmenusToParentMenu'
]);
Route::post('/menu-submenu', [
'as' => 'menu.submenu',
'uses' => 'MenuController@AssignSubmenusToParentMenu'
]);
 
Route::post('/getcandidatesbylocation', 'DocumentController@filterbyLocation');
Route::post('/getcandidatesbyjobtype', 'DocumentController@filterbyJobType');
Route::post('/getcandidatesByGenderAndOthers', 'DocumentController@filterbyGenderAndOthers');
Route::post('/filterByCategory', 'DocumentController@filterbyCategory');
Route::post('/getcandidatesByIndustry', 'DocumentController@getcandidatesByIndustryAndOthers');
Route::post('/getcandidatesBySalary', 'DocumentController@getcandidatesBySalaryAndOthers');
Route::post('/getcandidatesByAvailability', 'DocumentController@getcandidatesByAvalilabilityAndOthers');
Route::post('/getcandidatesByYearsOfExperience', 'DocumentController@getcandidatesByYearsOfExperience');
Route::post('/filterjob', 'TagController@FilterJobs');
Route::post('/filterByColor', 'ShortlistController@filterByColor');
Route::post('searchConditions', 'TagController@searchConditions');
Route::post('/filterUnsorted', 'TagController@UnsortedFilter');
Route::post('/filterRejected', 'TagController@RejectedFilter');
Route::post('/filterInReview', 'TagController@InReviewFilter');
Route::post('/filterShortlist', 'TagController@ShortListFilter');
Route::post('/filterOffered', 'TagController@OfferedFilter');
Route::post('/jobfilter', 'HomeController@JobFilter');
Route::post('/filterbyJobTitle', 'DocumentController@filterbyJobTitle');
Route::post('/send-candidates-email', 'TagController@EmailCandidates');
Route::post('/reject_applicant', 'TagController@RejectApplicant');
Route::post('/review_applicant', 'TagController@ReviewApplicant');
Route::post('/shortlist_applicant', 'TagController@ShortlistApplicant');
Route::post('/offered_applicant', 'TagController@OfferApplicant');
Route::post('/hire_applicant', 'TagController@HireApplicant');
Route::post('/view_user_record', 'TagController@GetUserRecords');
// Export to PDF
Route::post('exprort-classic-to-pdf', [
	'as' => 'export_classic',
	'uses' => 'ResumeController@ClassicPDF'
	]);
Route::post('exprort-standard-to-pdf', [
	'as' => 'export_standard',
	'uses' => 'ResumeController@StandardPDF'
	]);
Route::post('exprort-classic-experienced-to-pdf', [
	'as' => 'export_classic_experienced',
	'uses' => 'ResumeController@ClassicExperiencedPDF'
	]);
Route::post('exprort-tabular-to-pdf', [
	'as' => 'export_tabular',
	'uses' => 'ResumeController@TabularPDF'
	]);
Route::post('/add-referee', [
	'as' => 'add.referee',
	'uses'=> 'ResumeController@AddReferees'
	]);
Route::get('/index/resume/edit-referees/{id}', [
	'as' => 'edit.referee',
	'uses' => 'ResumeController@EditReferees'
	]);
 Route::post('/index/resume/update-referees', [
	'as' => 'update.referee',
	'uses' => 'ResumeController@UpdateReferees'
	]);
 Route::post('/delete-referee/{id}', [
 	'as' => 'delete.referee',
 	'uses' => 'ResumeController@DeleteReferee'
 	]);
 Route::get('/settings/create-field-of-study', [
 	'as' => 'create.field',
 	'uses' => 'SettingController@createFeildsOfStudy'
 	]);
  Route::get('/settings/create-field-of-study/{id}', [
 	'as' => 'edit.field',
 	'uses' => 'SettingController@EditFeildsOfStudy'
 	]);
  Route::get('/settings/all-field-of-study', [
 	'as' => 'all.fields',
 	'uses' => 'SettingController@showFeildsOfStudyList'
 	]);
 Route::post('/settings/add-fields', [
 	'as' => 'add.field',
 	'uses' => 'SettingController@AddFieldsOfStudy'
 	]);
// 	'as' => 'em', 
// 	'uses' => 'EmployerController@index'
// 	]);
//  Route::get('tests/resul/{id}/finish', function($id){
//   $topic = Topic::findOrFail($id);
//   $count_questions = Question::where('topic_id', $id)->count();
//   $answers = Answer::where('topic_id', $id)->get();
//   return view('finish', compact('topic', 'answers', 'count_questions'));
// });
 // take candidate to another page and submit the test
	//Route::get()
   // Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    //Route::resource('users', 'UsersController');
    //Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    //Route::resource('user_actions', 'UserActionsController');
   Route::post('topics_mass_destroy', ['uses' => 'TopicsController@massDestroy', 'as' => 'topics.mass_destroy']);
   Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
   Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
   Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);
	
	/// end of test .//// 
	
	Route::get('add-to-log', 'IndexController@AddToLog');    
    Route::get('backup/create', 'BackupController@create');
    Route::get('backup/download/{file_name}', 'BackupController@download');
    Route::get('backup/delete/{file_name}', 'BackupController@delete');
	Route::resource('user', 'UserController');
	Route::resource('role', 'RoleController');
	Route::resource('region', 'RegionController');
	Route::resource('backupsys', 'BackupController');
	Route::resource('search', 'SearchController');
	Route::resource('documents', 'DocumentController');
	Route::resource('profession', 'ProfessionController');
	Route::resource('log', 'HomeController');
	Route::resource('shortlist', 'ShortlistController');
	Route::resource('tag', 'TagController');
	Route::resource('client', 'ClientsController');
	Route::resource('policies', 'PolicyController');
	Route::resource('resume', 'ResumeController');
	Route::resource('employer', 'EmployerController');
	Route::resource('index', 'HomeController');
	Route::resource('plans', 'PackagesController');
	Route::resource('menu', 'MenuController');
	Route::resource('pages', 'PostController');
	Route::resource('blog', 'BlogController');
	Route::resource('banner', 'BannerController');
	Route::resource('aboutus', 'AboutUsController');
	Route::resource('ticket', 'TicketController');
	Route::resource('frequently', 'FrequentlyController');
	// Route::resource('')
		Route::get('/employer/post-jobs/{region_id}',
	array('as'=>'post_job.get_region','uses'=>'TagController@getCitiesByRegioinAjax')); 
});
 	// Route::resource('candidate', 'IndexController');
 
	Route::get('candidate/update_job_application/{region_id}',
	array('as'=>'candidate.index','uses'=>'IndexController@getCitiesByRegioinAjax')); 
	Route::get('tag/create/{region_id}',
	array('as'=>'tag.get','uses'=>'TagController@getCitiesByRegioinAjax')); 
	Route::get('/candidate/update_job_application_form',[
		'as' => 'candidate.index',
			'uses' => 'IndexController@showUpdateApplicantForm' 
			]);
	Route::get('/candidate/job_application_form',[
			'as' => 'candidate.applicaiton',
			'uses' => 'IndexController@showApplicantForm' 
			]);
	Route::post('/job_application_form',[
	'uses' => 'IndexController@PostJobApplication',
	'as' => 'job.application'
	]);
	Route::get('/show_success',[
			'as' => 'candidate.show_success',
			'uses' => 'IndexController@show_success'
			]);
	Route::post('/update_job_application_form/update_records',[
	'uses' => 'IndexController@addCandidate',
	'as' => 'candidate.addCandidate'
	]);
	// Route::get('/update_job_application_form/show_form/success', 'IndexController@show_success');
	Route::get('/usermanual', 'IndexController@readManual');
	Route::get('/datatable', 'IndexController@showDatatable');
	Route::get('/testpage', [ 
	'uses' =>function () {
 return view('sett');
	}]);
	Route::post('post-test', [
		'as'=> 'test.code',
		'uses' => 'IndexController@Image'
		]);
	Route::get('/sendEmail', [
		'as' => 'send.email_candidates',
		'uses' => 'IndexController@SendEmailToCandidates'
		]);
 Route::post('upload_email', [
	'as' => 'upload.emails',
	'uses' => 'IndexController@UploadEmailsFromCSV' 
	]);
Route::get('candidates', [
	'as' => 'candidate.go',
	'uses' => 'IndexController@showEmails']);
	Route::post('/admin/upload_from_csv',[
			'as' => 'upload.email',
	 		'uses' => 'IndexController@UploadEmailsFromCSV'
	]);
	Route::get('/show_upload_from_csv',[
			'as' => 'show.uploademail',
	 		'uses' => 'IndexController@showUploadPage'
	]);
	
 Route::get('/testpage2', function () {
 	return view();
 });
 Route::get('/testpage2', function () {
 //$pathToFile = public_path().'/uploads/'.'R-24 user Manual.docx';
//$pathToFile = 'C:/xampp/htdocs/laravel/storage/R-24 user Manual.docx'; // or txt etc.
 $pathToFile = storage_path('/app/R-24 user Manual.docx');
  // dd($pathToFile);
 $file = file($pathToFile);
// dd($file);
// when the file name (display name) is decided by the name in storage,
// remember to make sure your server can store your file name characters in the first place (!)
// then encode to respect RFC 6266 on output through content-disposition
$fileNameFromStorage = rawurlencode(basename($pathToFile));
 // dd($fileNameFromStorage);
// otherwise, if the file in storage has a hashed file name (recommended)
// and the display name comes from your DB and will tend to be UTF-8
// encode to respect RFC 6266 on output through content-disposition
// $fileNameFromDatabase = rawurlencode('пожалуйста.pdf');
// Storage facade path is relative to the root directory
// Defined as "storage/app" in your configuration by default
// Remember to import Illuminate\Support\Facades\Storage
// return response()->file(storage_path($pathToFile), [
//     'Content-Disposition' => str_replace('%name', $fileNameFromStorage, "inline; filename=\"%name\"; filename*=utf-8''%name"),
//     'Content-Type'        => Storage::getMimeType($pathToFile), // e.g. 'application/pdf', 'text/plain' etc.
// ]);
// return response()->file($pathToFile, [
//   'Content-Disposition' => 'inline; filename="'. $fileNameFromStorage .'"'
// ]);
    // ->header('ContentType', 'text/plain')
    // ->header('Content-Disposition', "inline; filename='$pathToFile'");
	return response()->file($pathToFile, $headers);
// return response()->file($pathToFile) ->header('Content-Disposition', "inline; filename='$filename'");
    // return Response::make($pathToFile, 200)
    // ->header('ContentType', 'text/plain')
    // ->header('Content-Disposition', "inline; filename='$pathToFile'");
// return response()->file($pathToFile);
	});
 
Route::get('inbrowser', function(){
  // $extension = $request->file('file')->getClientOriginalExtension();
  // $filename = $request->book_name.'.'. $extension;
  // $request->file('file')->move(storage_path().'/books/', $filename);
$fullPath = storage_path().'/app/'. 'Emeka iwuchukwu.pdf';
//$fullPath = storage_path().'/app/'. 'R-24 user Manual.docx';
  //
  $content_types = [
    'application/octet-stream', // txt etc
    'application/msword', // doc
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document', //docx
    'application/vnd.ms-excel', // xls
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // xlsx
    'application/pdf', // pdf
];
// dd($fullPath); 
 if(file_exists($fullPath)) {
        //$contentType = mime_content_type($fullPath);
         //dd($contentType); 
        return Response::make(file_get_contents($fullPath), 200, [
        'Content-Type' => $content_types,
        'Content-Disposition' => 'inline; filename="'.$fullPath.'"']);
  } else {
      return 'NOT HERE';
  }
                            
});
