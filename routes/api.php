<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});


Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'auth:api'], function() {
        Route::group(['middleware' => 'rol.admin'], function() {
            Route::resource('usuarios', 'AdminController');
            Route::post('crear-doctor', 'AdminController@crearDoctor');
            Route::post('sacar-doctor', 'AdminController@sacarDoctor');
        });
    });
});

//TODO
Route::group(['prefix' => 'doctor'], function () {
    Route::group(['middleware' => 'auth:api'], function() {
        Route::group(['middleware' => 'rol.admin:doctor'], function() {
            Route::get('especialidad', 'DoctorController@optenerEspecialidades');
        });
    });
});


Route::middleware('auth:api')->get('/prueba3', function (Request $request) {
    $usuario = $request->user();
    $usuario->doctor;
    return $usuario;
});
