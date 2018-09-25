<?php

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


//Home public - pages accessible to the public
Route::get('/', 'HomePublicController@index');
Route::get('features', 'HomePublicController@features');
Route::get('videos', 'HomePublicController@videos');
Route::get('schoolRegistrationForm', 'HomePublicController@schoolRegistrationForm');
Route::post('checkdomainavailability', 'HomePublicController@checkDomainAvailability')->name('check_domain_availability');
Route::post('postSchoolRegistrationForm', 'HomePublicController@postSchoolRegistrationForm')->name('SchoolRegistrationForm');

//Documentation Studnets
Route::get('documentation/students/showdocumentation', 'Documentation\StudentsController@studentsDocumentation');

Route::get('/careers', 'HomePublicController@careers');
Route::get('/careers/jobdetails/{job}', 'HomePublicController@jobDetails');
Route::get('/careers/jobapplicationform/{job}', 'HomePublicController@jobApplicationForm');
Route::post('/careers/postjobapplicationform', 'HomePublicController@postJobApplicationForm');
Route::get('/contact', 'HomePublicController@contact');
Route::post('/postcontactform', 'HomePublicController@postContactForm');

//Stripe Payment Testing
Route::get('/stripe/test', 'Stripe\StripeController@index');
Route::post('/stripe/charge', 'Stripe\StripeController@charge');

//Auth routes
Auth::routes();

//Logged in users
Route::get('/home', 'HomeController@index')->name('home');

//Logged in Admin users
Route::group(['middleware' => 'admin'], function () {
    
    Route::get('/admin/home', 'Admin\HomeController@index');

    //Documentation
    Route::get('/admin/documentation/categories', 'Admin\DocumentationController@categories');
    Route::get('/admin/documentation/students', 'Admin\DocumentationController@students');


    //School Registration
    Route::get('/admin/schools/registration', 'Admin\Schools\RegistrationController@registration');


});
