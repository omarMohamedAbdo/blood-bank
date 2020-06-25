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

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/test', 'test');
Route::get('/login/hospital', 'Auth\LoginController@showHospitalLoginForm')->name('hospitalLogin');
Route::get('/register/hospital', 'Auth\RegisterController@showHospitalRegisterForm')->name('hospitalRegister');

Route::post('/login/hospital', 'Auth\LoginController@hospitalLogin');
Route::post('/register/hospital', 'Auth\RegisterController@createHospital');



//Hospital routes   ->only viewed by hospital
Route::group(
    [
        'prefix' => "hospital", //all hospital routes will start with /hospital
        'middleware' => 'auth:hospital'
    ],
    function () {
        // Route::view('', 'hospital');
        Route::get('', 'HospitalController@index')->name('hospitalHome');
        Route::resource('donations', 'DonationController');
        Route::resource('requests', 'RequestController');
        Route::resource('donors', 'DonorController');
        Route::get("donationsList", "DonationController@index");
        Route::resource('chart', "DonationChartController");
        Route::get('/reports', 'DonationChartController@index');
        Route::get('/donate/{request}', 'DonationController@showDonationForm')->name('createHospitalDonation');
        Route::get('/inventoryedit', 'HospitalController@edit')->name('inventoryedit');
        Route::put('/inventoryupdate', 'HospitalController@update')->name('inventoryupdate');
        Route::get('/inventory', 'HospitalController@show')->name('inventoryshow');
        Route::get('/profile', 'hospital\ProfileController@index')->name('hospitalProfile');
        Route::put('/updateProfile', 'hospital\ProfileController@update')->name('updateHospitalProfile');
        Route::get('/otherHospitals', 'hospital\FeedbackController@index')->name('otherHospitals');
        Route::get('/hospitalFeedback/{hospital}', 'hospital\FeedbackController@show')->name('hospitalFeedback');
        Route::post('/saveHospitalFeedback/{id}', 'hospital\FeedbackController@store')->name('saveHospitalFeedback');
        
    }
); //end of hospital middleware

// Route::view('/hospital', 'hospital')->middleware('auth:hospital');
Route::group(
    [
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/campaigns', 'donor\CampaignController@index')->name('campaigns');
        Route::get('/hospitals', 'donor\HospitalController@index')->name('hospitals');
        Route::get('/donate/{campaign}', 'donor\DonationController@showDonationForm')->name('createDonation');
        Route::post('/saveDonation/{campaign}', 'donor\DonationController@save')->name('saveDonation');
        Route::post('/saveGeneralDonation', 'donor\DonationController@saveGeneral')->name('saveGeneralDonation');
        Route::get('/profile', 'donor\ProfileController@index')->name('profile');
        Route::put('/updateProfile', 'donor\ProfileController@update')->name('updateProfile');
        Route::get('/userFeedback/{hospital}', 'donor\FeedbackController@show')->name('userFeedback');
        Route::post('/saveUserFeedback/{id}', 'donor\FeedbackController@store')->name('saveUserFeedback');
        Route::get('/stories', 'StoryController@index')->name('stories');

    }
); //end of Donor middleware




// Admin routes -> only viewed by hospital
Route::group(
    [
        'prefix' => "admin", //all admin routes will start with /admin
        'middleware' => 'admin'
    ],
    function () {

        Route::get('', 'AdminController@index')->name('adminHome');
        Route::get('inactiveHospitals', 'AdminController@inactiveHospitals')->name('inactiveHospitalList');
        Route::put('activeHospital', 'AdminController@activeHospital');
        Route::put('deActiveHospital', 'AdminController@deActiveHospital');
        Route::get('HospitalList', 'AdminController@hospitalList')->name('hospitalList');
        Route::delete('deleteHospital', 'AdminController@deleteHospital');
        Route::get('newAdmin', 'AdminController@newAdmin')->name('newAdmin');
        Route::post('createNewAdmin', 'AdminController@createNewAdmin');
        Route::put('updateHospital', 'AdminController@updateHospital');
        Route::get('requestList', 'AdminController@requestList')->name('requestList');
        Route::delete('deleteRequest', 'AdminController@deleteRequest');
        Route::get('privateRequestList', 'AdminController@privateRequestList')->name('privateRequestList');


        // Users Routes
        Route::get('usersList', 'AdminController@userslList')->name('userslList');
        Route::get('inactiveUsers', 'AdminController@inactiveUsers')->name('inactiveUserList');
        Route::put('activeUser', 'AdminController@activeUser');
        Route::put('deActiveUser', 'AdminController@deActiveUser');
        Route::put('upgradeUser', 'AdminController@upgradeUser');
        Route::put('downgradeUser', 'AdminController@downgradeUser');
        Route::delete('deleteUser', 'AdminController@deleteUser');
        Route::get('/viewUser/{id}', 'AdminController@viewUser')->name('viewUser');
    }
); //end of admin middleware
