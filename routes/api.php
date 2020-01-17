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

// everything properties
Route::apiResources(['property' => 'API\PropertyController']);
Route::get('loadall/{location}/{paginate}', 'API\PropertyController@loadAll');
Route::get('loadrandom/{limit}', 'API\PropertyController@loadRandom');
Route::get('/findproperty', 'API\PropertyController@findProperty');
Route::get('/findspecificproperty/{location}', 'API\PropertyController@findSpecificProperty');
Route::get('showproperty/{id}', 'API\PropertyController@property');

// everything users
Route::apiResources(['user' => 'API\UserController']);
Route::get('profile', 'API\UserController@profile');
Route::put('profile', 'API\UserController@updateProfile');
