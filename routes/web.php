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
Route::view('/test', 'test');
Route::get('/login/hospital', 'Auth\LoginController@showHospitalLoginForm')->name('hospitalLogin');
Route::get('/register/hospital', 'Auth\RegisterController@showHospitalRegisterForm')->name('hospitalRegister');

Route::post('/login/hospital', 'Auth\LoginController@hospitalLogin');
Route::post('/register/hospital', 'Auth\RegisterController@createHospital');



//Hospital routes   ->only viewed by hospital
Route::group([
    'prefix' => "hospital", //all hospital routes will start with /hospital
    'middleware' => 'auth:hospital'
    ],
    function () {
        Route::view('', 'hospital');
        Route::resource('donations', 'DonationController');
        Route::resource('requests', 'RequestController');
        Route::get("donationsList", "DonationController@index");
        
    });//end of hospital middleware

// Route::view('/hospital', 'hospital')->middleware('auth:hospital');
Route::group([
    'middleware' => 'auth'
    ],
    function () {
        Route::get('/campaigns', 'donor\CampaignController@index')->name('campaigns');
        Route::get('/donate/{campaign}','donor\DonationController@showDonationForm')->name('createDonation');
        Route::post('/saveDonation/{campaign}','donor\DonationController@store')->name('saveDonation');
    });//end of Donor middleware
