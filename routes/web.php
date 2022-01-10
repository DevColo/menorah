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

Route::get('/', function () {
    return view('login');
});
//view Academic Year
Route::get('ViewAcademicYear','AcademicYearController@show');
Route::post('ViewAcademicYear/data','AcademicYearController@YearData');

//View Campus
Route::get('ViewCampus','CampusController@show');
Route::post('ViewCampus/data','CampusController@anyData');

//View Class
Route::get('ViewClass', 'ClassController@show');
Route::post('ViewClass/data','ClassController@anyData');

//View Subject
Route::get('ViewSubject','AddSubjectController@show');
Route::post('ViewSubject/data','AddSubjectController@anyData');

//View Student
Route::get('ViewStudent','RegisterStudentController@show');
Route::post('ViewStudent/data','RegisterStudentController@anyData');

//View Staff
Route::get('ViewStaff','RegisterStaffController@show');
Route::post('ViewStaff/data','RegisterStaffController@anyData');

//Edit Staff
Route::get('editStaff/{id}', 'RegisterStaffController@edit');

Route::get('createYear','AcademicYearController@index');
Route::resource('addYear','AcademicYearController');
Route::get('registerStaff','RegisterStaffController@index');
Route::resource('addStaff','RegisterStaffController');
Route::get('addSchool','SchoolController@index');
Route::get('dashboard','HomeController@index');
Route::get('createClass','ClassController@createClass');
Route::resource('addClass','ClassController');
Route::get('createSubject','AddSubjectController@createSubject');
Route::resource('registerSchool','SchoolController');
Route::get('createCampus','CampusController@createCampus');
Route::resource('addCampus','CampusController');
Route::resource('addSubject','AddSubjectController');
Route::get('registerStudent','RegisterStudentController@index');
Route::resource('addStudent','RegisterStudentController');
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
