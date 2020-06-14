<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/hospital', 'Auth\LoginController@showHospitalLoginForm')->name('hospitalLogin');
Route::get('/register/hospital', 'Auth\RegisterController@showHospitalRegisterForm')->name('hospitalRegister');

Route::post('/login/hospital', 'Auth\LoginController@hospitalLogin');
Route::post('/register/hospital', 'Auth\RegisterController@createHospital');

//Hospital routes   ->only viewed by hospital
Route::group([
    'prefix' => "hospital", //all admin routes will start with /admin
    'middleware' => 'auth:hospital'
    ],
    function () {
        Route::view('', 'hospital');
        
    });//end of hospital middleware

// Route::view('/hospital', 'hospital')->middleware('auth:hospital');

