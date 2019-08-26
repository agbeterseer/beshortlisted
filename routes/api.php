<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List articles
//Route::get('jobs', 'JobController@index');
Route::get('jobs', 'JobController@getJobs');
// List single article
Route::get('jobs/{id}', 'JobController@show');

// Create new article
Route::post('jobs', 'JobController@store');

// Update article
Route::put('jobs', 'JobController@store');

// Delete article
Route::delete('jobs/{id}', 'JobController@destroy');

// get search bar collections
Route::get('search', 'JobController@SearchBar');
Route::get('cities', 'JobController@getCities');
Route::get('industryprofessions', 'JobController@getIndustryProfessions');
Route::get('industries', 'JobController@getIndustries');
Route::get('vacancytypes', 'JobController@getVacancyTypes');
Route::get('/filter/city/{city}/vacancytype/{vacancytype}/industry/{industry}', 'JobController@JobFilter');

Route::get('/load/rejectedcv', 'TagController@GetCandidatesByJobApplication');
Route::get('industry', 'JobController@FilterJobs');
 
// get applicants for shortlist

Route::get('/job/applicants/{code}', 'JobController@getApplicantsByJobID');
Route::get('/job/getrejectedapplicants/{code}', 'JobController@getRejectedApplicants');
Route::get('/job/inreview/{code}', 'JobController@getReviewApplicants');
Route::get('/job/shortlist/{code}', 'JobController@getShortlistedApplicants');
Route::get('/job/offer/{code}', 'JobController@getOfferedApplicants');
Route::get('/job/hire/{code}', 'JobController@getHireApplicants');

Route::get('/singlecv/{code}', 'JobController@GetCandidateCV');
Route::get('/job/workexperience/{code}', 'JobController@getWorkExperienceByJobID');


// get applicants count
Route::get('/unsortedcount/{code}', 'JobController@UnsortedCount');
Route::get('/rejectedcount/{code}', 'JobController@RejectedCount');
Route::get('/reviewcount/{code}', 'JobController@ReviewCount');
Route::get('/shortlistcount/{code}', 'JobController@ShortlistedCount');
Route::get('/offeredcount/{code}', 'JobController@OfferedCount');
Route::get('/hiredcount/{code}', 'JobController@HiredCount');


// get CV properties
Route::get('/objective/{code}', 'JobController@GetObjective');

// Create shortist, rejected, inreview, etc...
Route::get('/addrejectcv/{code}', 'JobController@CreateRejectApplicant');
Route::get('/addreviewcv/{code}', 'JobController@CreateReviewApplicant');
Route::get('/addshortlist/{code}', 'JobController@CreateShortlistApplicant');
Route::get('/addhire/{code}', 'JobController@CreateHireApplicant'); 
Route::get('/addoffer/{code}', 'JobController@CreateOfferedApplicant'); 



Route::get('/educationalexperience/{code}', 'JobController@GetEducationalExperience');


Route::get('/employer/job/applicants/{id}', [
	'as' => 'get.applicantsid',
	'uses' => 'TagController@GetCandidatesByJobApplication2'
	]);

Route::get('/api/v1/users', [
    'as' => 'users',
   	'uses' => 'HomeController@indexapi'
        ]);
 


 // 
Route::get('/job/newunsortedlist/{code}' ,'JobController@getNewUnsortedApplicant');
Route::get('/job/newrejectedlist/{code}' ,'JobController@getNewRejectedApplicant');
Route::get('/job/newreviewlist/{code}' ,'JobController@getNewReviewApplicant');
Route::get('/job/newshortlist/{code}' ,'JobController@getNewShortlistApplicants');
Route::get('/job/newofferlist/{code}' ,'JobController@getNewOfferApplicants');
Route::get('/job/newhiredlist/{code}' ,'JobController@getNewHiredApplicants');
Route::get('/job/cvcontent/{code}','JobController@GetContent');

Route::get('/employer/job/applicants/{code}', 'JobController@getNewUnsortedApplicant');

