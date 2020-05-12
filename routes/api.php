<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('mahasiswas', 'MahasiswaController');
Route::get('mahasiswas', 'MahasiswaController@index');
Route::get('mahasiswas/{id}', 'MahasiswaController@show');
Route::post('mahasiswas', 'MahasiswaController@store');
Route::put('mahasiswas/{id}', 'MahasiswaController@update');
Route::delete('mahasiswas/{id}', 'MahasiswaController@delete');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
	Route::post('register', 'AuthController@register');
	Route::post('login', 'AuthController@login');
	Route::post('logout', 'AuthController@logout');
	Route::post('refresh', 'AuthController@refresh');
	Route::post('me', 'AuthController@me');
});
