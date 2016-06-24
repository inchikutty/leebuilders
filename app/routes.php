<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){ return View::make('hello'); });
Route::post('/api/v1/users/login/{un}/{pw}', ['uses' => 'HomeController@login']);
Route::post('/api/v1/users/register/{un}/{pw}/{name}/{role}', ['uses' => 'HomeController@register']);
//Mustroll APIs
Route::post('/api/v1/mustrolls/add/{mustroll}',[ 'uses' => 'HomeController@createMustRoll']);
Route::post('/api/v1/mustrolls/view/{id}',[ 'uses' => 'HomeController@viewMustRoll']);
Route::post('/api/v1/mustrolls/delete/{id}',[ 'uses' => 'HomeController@deleteMustRoll']);
Route::post('/api/v1/mustrolls/modify/{id}',[ 'uses' => 'HomeController@modifyMustRoll']);
Route::post('/api/v1/mustrolls/get/',[ 'uses' => 'HomeController@getAllMustRolls']);
//site APIS
Route::post('/api/v1/sites/add/{site}',[ 'uses' => 'HomeController@addSite']);
Route::post('/api/v1/sites/delete/{id}',[ 'uses' => 'HomeController@deleteSite']);
Route::post('/api/v1/sites/modify/{id}',[ 'uses' => 'HomeController@modifySite']);
Route::post('/api/v1/sites/get/',[ 'uses' => 'HomeController@getSites']);
//project APIs
Route::post('/api/v1/projects/add/{project}',[ 'uses' => 'HomeController@addProject']);
Route::post('/api/v1/projects/delete/{id}',[ 'uses' => 'HomeController@deleteProject']);
Route::post('/api/v1/projects/modify/{id}',[ 'uses' => 'HomeController@modifyProject']);
Route::post('/api/v1/projects/get/',[ 'uses' => 'HomeController@getProjects']);
//owned equipment database
Route::post('/api/v1/assets/add/{equipment}',[ 'uses' => 'HomeController@addOwnedEquip']);
Route::post('/api/v1/assets/delete/{id}',[ 'uses' => 'HomeController@deleteOwnedEquip']);
Route::post('/api/v1/assets/modify/{id}',[ 'uses' => 'HomeController@modifyOwnedEquip']);
Route::post('/api/v1/assets/get/',[ 'uses' => 'HomeController@getAllOwnedEquip']);
//human assets
Route::post('/api/v1/human/add/{worker}',[ 'uses' => 'HomeController@addWorker']);
Route::post('/api/v1/human/delete/{id}',[ 'uses' => 'HomeController@deleteWorker']);
Route::post('/api/v1/human/modify/{id}',[ 'uses' => 'HomeController@modifyWorker']);
Route::post('/api/v1/human/get/',[ 'uses' => 'HomeController@getWorkers']);
//additional APIs to show site incharge purchase etc
Route::post('/api/v1/incharge/',[ 'uses' => 'HomeController@getSiteIncharge']);
Route::post('/api/v1/purchase/',[ 'uses' => 'HomeController@getAllPurchase']);
