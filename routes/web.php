<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use Symfony\Component\Routing\Route;

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
    return view('default');
});

//MAINTAINCE PAGE
Route::get('/maitiance', function () {
    return view('admissions.layouts.Maintance');
});

Route::get('/classroom/init', 'GoogleClassroomsController@init')->name('classroom.init');

Route::post('/api/students/remita/confirm', 'APIController@confirmationNotification')->name('api.student.remita-confirm');

Route::post('/api/test', 'APIController@test')->name('api.test');

Auth::routes();




//Authentication Staff Routes
Route::get('/staff/login', 'Auth\StaffLoginController@showLoginForm')->name('staff.login');
Route::post('/staff/login', 'Auth\StaffLoginController@login')->name('staff.login.submit');
Route::get('/staff/home', 'StaffController@home')->name('staff.home');
Route::post('/staff/logout', 'Auth\StaffLoginController@logout')->name('staff.logout');


//Authentication Student Routes
Route::get('/students/login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
Route::post('/students/login', 'Auth\StudentLoginController@login')->name('student.login.submit');
Route::get('/students/home', 'StudentsController@home')->name('student.home');
Route::post('/students/logout', 'Auth\StudentLoginController@logout')->name('student.logout');

// Checks the status of payments made in the bank
Route::get('/remitas', 'RemitaBankPaymentController@index')->name('remitas.remitaBankVerification');
Route::get('/re sponse', 'RemitaBankPaymentResponseController@handle')->name('remitas.remitaBankResponse');


Route::get('/admissions/login', function () {
    return view('admissions.login');
});

// Academic Departments routes
require_once "academic_departments.php";

// Admin Departments routes
require_once "admin_departments.php";

// Bursary routes
require_once "bursary.php";

// Colleges routes
require_once "colleges.php";

// Courses routes
require_once "courses.php";

// ProgramCourses routes
require_once "program_courses.php";

// Programs routes
require_once "programs.php";

// Sessions routes
require_once "sessions.php";

// Staff routes
require_once "staff.php";

// Admin Students routes
require_once "admin_students.php";

//Security routes
require_once "security.php";

// Student routes
require_once "students.php";

// Students Results routes
require_once "student_results.php";


//Exam Officers functions
require_once "exam_officers.php";

//Evaluation functions
require_once "evaluation.php";


// Labs
require_once "labs.php";

//Utilities and Random functions
require_once "utilities.php";

//Soteria functions
require_once "soteria.php";

//ASMIISONS ROUNTS
require_once "admissions.php";





