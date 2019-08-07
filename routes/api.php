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

Route::prefix('v1')->group(function(){
	
	Route::post('record/store','RecordController@store');
	Route::post('record/rewrite','RecordController@rewrite');
	Route::post('record/load','RecordController@load');
	Route::post('record/delete', 'RecordController@delete');

	Route::post('group/store','GroupController@store');
	Route::post('group/connect','GroupController@connect');
});
// economic_app.test/api/v1/group/store