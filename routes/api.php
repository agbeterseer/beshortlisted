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




Route::get('/api/v1/users', [
    'as' => 'users',
   	'uses' => 'HomeController@indexapi'
        ]);
        
        Route::get('/testreere', function () {
            return response('Test API', 200)
                          ->header('Content-Type', 'application/json');
        });