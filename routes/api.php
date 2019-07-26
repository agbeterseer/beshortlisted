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

//  Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
// Route::resource('employer', 'EmployerController', ['except' => ['create', 'edit']]);
//  Route::get('/v1/api/candidates', [
//     	'uses' => 'EmployerController@ListCandidates2'
//     	]);
   
//  });

Route::get('/api/v1/users', [
    'as' => 'users',
   	'uses' => 'HomeController@indexapi'
        ]);
        
        Route::get('/testreere', function () {
            return response('Test API', 200)
                          ->header('Content-Type', 'application/json');
        });