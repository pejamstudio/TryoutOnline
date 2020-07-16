<?php

use Illuminate\Http\Request;
use App\user;

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

Route::get('read', function (){
	return user::all();
});

Route::post('load_guru', "ApiController@read_guru");
Route::post('create_guru', "ApiController@create_guru");
