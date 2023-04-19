<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config-cache');
    return 'DONE';
});

Route::prefix('/admin')->group(function () {
    Route::get('upload', [AdminController::class, 'courseUpload'])->name('admin.course_upload');
    Route::get('upload/{staff_course_id}', [AdminController::class, 'scoresUpload'])->name('admin.scores_upload');
    Route::post('upload', [AdminController::class, 'uploadScores'])->name('admin.upload_scores');
    Route::get('approve-scores', [AdminController::class, 'approveScores'])->name('admin.approve_scores');
    Route::get('notuploaded-scores', [AdminController::class, 'notuploadedScores'])->name('admin.notuploaded_scores');
    Route::get('approve-scores/view/{course_id}', [AdminController::class, 'viewScores'])->name('admin.view_scores');
    Route::post('/scores/approve', [AdminController::class, 'approve'])->name('admin.approve');
    Route::get('/scores/decline/{staff_course_id}', [AdminController::class, 'decline'])->name('admin.decline');
    Route::get('/compute', [AdminController::class, 'showCompute'])->name('admin.show_compute');
    Route::get('/download/{staff_course_id}', [AdminController::class, 'downloadResultCsv']);
    Route::post('/upload-scores', [AdminController::class, 'uploadResultCsv']);
});
Route::post('/admin/compute', [AdminController::class, 'compute'])->name('admin.compute');
Route::post('/admin/compute-progress', [AdminController::class, 'batchProgress'])->name('admin.show_progress');


//Registration Route
Route::get('/register', function () {
    return view('admissions.register');
});

Route::get('/confirmation', 'App\Http\Controllers\ApplicantController@cofirmation');

Route::post('/register', 'App\Http\Controllers\ApplicantController@register');

//Applicants LOGIN ROUTE
// Route::get('/admissions/login', function () {
//     return view('login');
// });
// Route::get('/login', function () {
//     return view('login');
// });


//MAINTAINCE
Route::get('/maintane', function () {
    return view('admissions.layouts.Maintance');
});

Route::get('/forgotpassword', function () {
    return view('admissions.forgotpassword');
});
Route::get('/forgotpasswordSetNew', function () {
    return view('admissons.forgotpasswordSetNew');
});
Route::post('/forgotpassword', 'App\Http\Controllers\ApplicantController@forgotpassword');

Route::get('/logoutUser', 'App\Http\Controllers\ApplicantController@logoutUsers');
//Applicants Home Page
Route::post('/login', 'App\Http\Controllers\ApplicantController@login');
Route::get('/dashboard', 'App\Http\Controllers\ApplicantController@admissionstatus');
Route::get('/completeadmissions', 'App\Http\Controllers\ApplicantController@completeadmissions');
Route::get('/generatematricnumber2', 'App\Http\Controllers\AdminStudentsControllerApplicant@create');


Route::post('/admissions/students/store', 'App\Http\Controllers\AdminStudentsControllerApplicant@store')->name('admissions.student.store');
// Route::get('/students/search', 'App\Http\Controllers\AdminStudentsControllerApplicant@search')->name('student.search');
Route::get('/admissions/students/show/{id}', 'App\Http\Controllers\AdminStudentsControllerApplicant@showapplicant')->name('admissions.student.show');
//Route for ApplicanT Search
Route::get('/admissions/students/list', 'App\Http\Controllers\AdminController@list')->name('admissions.student.list');

Route::get('/admissons/students/search', 'App\Http\Controllers\AdminController@search')->name('admissions.student.search');

Route::post('/admissions/students/find', 'App\Http\Controllers\AdminController@find')->name('admissions.student.find');
// require_once "admin_students.php";

// HOME ROUTE
Route::get('/home', 'App\Http\Controllers\ApplicantController@paymen');

//ROUTING FOR REMITA PAYMENT
Route::get('/payment', 'App\Http\Controllers\ApplicantController@payment');
// Route::post('/payment', 'App\Http\Controllers\RemitaController@processRRR');
// Route::post('/payment', 'App\Http\Controllers\ApplicantController@payment');
Route::get('/newPayment', 'App\Http\Controllers\ApplicantController@payment');
Route::get('/schoolfeespayment', 'App\Http\Controllers\ApplicantController@schoolfeespayment');
Route::get('/acceptancepayment', 'App\Http\Controllers\ApplicantController@paymentacceptance');
Route::get('/paymentview/{id}', 'App\Http\Controllers\ApplicantController@Viewpayment');


Route::post('/payremi', 'App\Http\Controllers\ApplicantController@payremi');
Route::post('/logpay', 'App\Http\Controllers\ApplicantController@logpay');

// View Receipt
Route::get('/receipt/{rrr}', 'App\Http\Controllers\ApplicantController@receipt');

// UTME ROUTING
//Route::get('/utme', 'App\Http\Controllers\ApplicantController@utmejamb');
Route::get('/utme', 'App\Http\Controllers\ApplicantController@utme');

Route::post('/utmebiodata', 'App\Http\Controllers\ApplicantController@utmebiodata');
Route::post('/utmesponsers', 'App\Http\Controllers\ApplicantController@utmesponsors');
Route::post('/utmejamb', 'App\Http\Controllers\ApplicantController@utmejamb');
//Route::post('/utmeolevel', 'App\Http\Controllers\ApplicantController@utmeolevel');
Route::post('/utmeuploads', 'App\Http\Controllers\ApplicantController@utmeuploads');

//Transfer ROUTING
Route::get('/transfers', 'App\Http\Controllers\ApplicantController@transfers');

Route::post('/transfersbiodata', 'App\Http\Controllers\ApplicantController@transfersbiodata');
Route::post('/transferssponsors', 'App\Http\Controllers\ApplicantController@transferssponsors');
Route::post('/transfersinformation', 'App\Http\Controllers\ApplicantController@transfersinformation');
// Route::post('/transfersolevel', 'App\Http\Controllers\ApplicantController@transfersolevel');
Route::post('/transfersuploads', 'App\Http\Controllers\ApplicantController@transfersuploads');

//Direct Entery ROUTING
Route::get('/de', 'App\Http\Controllers\ApplicantController@de');

Route::post('/debiodata', 'App\Http\Controllers\ApplicantController@debiodata');
Route::post('/desponsors', 'App\Http\Controllers\ApplicantController@desponsors');
Route::post('/dejamb', 'App\Http\Controllers\ApplicantController@dejamb');
Route::post('/deinformation', 'App\Http\Controllers\ApplicantController@deinformation');
Route::post('/deolevel', 'App\Http\Controllers\ApplicantController@deolevel');

//Post Graduate ROUTING
Route::get('/pg', 'App\Http\Controllers\ApplicantController@pg');

Route::post('/pgbiodata', 'App\Http\Controllers\ApplicantController@pgbiodata');
Route::post('/pgsponsors', 'App\Http\Controllers\ApplicantController@pgsponsors');
Route::post('/pginformation', 'App\Http\Controllers\ApplicantController@pginformation');
Route::post('/pgolevel', 'App\Http\Controllers\ApplicantController@pgolevel');

//ROUTING FOR ADMISSION
//Route::get('/admission', 'App\Http\Controllers\ApplicantController@admission');

//ROUTING FOR PRINT printreceipt
// Route::get('/printreceipt', function () {
//     return view('printreceipt');
// });

// Route::get('/utmeletter', 'App\Http\Controllers\ApplicantController@utmeletter');
Route::get('/utmeletter', 'App\Http\Controllers\ApplicantController@generatePDF');
//Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
// Route::get('/generate-pdf', 'App\Http\Controllers\PDFController@generatePDF');
//route for downloading admission leter
// Route::get('/utmeletter', 'App\Http\Controllers\PDFController@generatePDF');
// Route::get('/deletterPDF', 'App\Http\Controllers\PDFController@generatePDF');
// Route::get('/transferletterPDF', 'App\Http\Controllers\PDFController@generatePDF');
// Route::get('/pgletterPDF', 'App\Http\Controllers\PDFController@generatePDF');

//PASSWORD RESET
Route::get('/forgotpassword', function () {
    return view('admissions.forgotpassword');
});
Route::Get('/resetpassword', 'App\Http\Controllers\ApplicantController@forgotpasswordSetNew');

Route::post('/resetpassword', 'App\Http\Controllers\ApplicantController@resetpassword');

Route::post('/forgotpassword', 'App\Http\Controllers\ApplicantController@forgotpassword');
//END PASSWORD RESET



//VIEW PROFILE
Route::get('/viewprofile', 'App\Http\Controllers\ApplicantController@viewprofile');

// Route::group(['middleware' => ['/adminHome']], function () {
//     return view('admissions.administratorHome');
// });

//EDIT PROFILE
Route::get('/editprofile', 'App\Http\Controllers\ApplicantController@editprofile');
//EDIT PROFILE UTME
Route::post('/editbiodata', 'App\Http\Controllers\ApplicantController@editbiodata');
Route::post('/editsponsers', 'App\Http\Controllers\ApplicantController@editsponsors');
Route::post('/editutmejamb', 'App\Http\Controllers\ApplicantController@editutmejamb');
Route::post('/eidtdejamb', 'App\Http\Controllers\ApplicantController@editdejamb');
Route::post('/edittransfersinformation', 'App\Http\Controllers\ApplicantController@edittransfersinformation');
Route::post('/editdeinformation', 'App\Http\Controllers\ApplicantController@editdeinformation');
Route::post('/editpginformation', 'App\Http\Controllers\ApplicantController@editpginformation');
// Route::post('/editolevel', 'App\Http\Controllers\ApplicantController@editolevel');
Route::post('/editutmeuploads', 'App\Http\Controllers\ApplicantController@editutmeuploads');

//EDIT PROFILE PG


// Route::get('/home', 'App\Http\Controllers\ApplicantController@userapp');



//ROUTING FOR ADMISSION
Route::get('/admission', 'App\Http\Controllers\ApplicantController@admissionstatus');
// Route::get('/admission', 'App\Http\Controllers\ApplicantController@admission');



//Admin Login Route
Route::get('/adminLogin', function () {
    return view('admissions.admin_login');
});


//Registration Route
// Route::get('/adminRegister', function () {
//     return view('adminRegister');
// });

Route::post('/admin', 'App\Http\Controllers\AdminController@login');
Route::post('/adminRegister', 'App\Http\Controllers\AdminController@register');

// Admin Roles
Route::post('/adminRole', 'App\Http\Controllers\AdminController@adminRole');
Route::get('/adminRole', function () {
    return view('admissions.addRole');
});

Route::get('/error', function () {
    return view('admissions.error');
});

// Admin task to roles
Route::get('/adminTaskToRole', 'App\Http\Controllers\AdminController@adminTaskToRole');
Route::post('/adminTaskToRole', 'App\Http\Controllers\AdminController@submitTaskToRole');
Route::get('/getTasks', 'App\Http\Controllers\AdminController@getRoleTasks');

// Remove task from roles
Route::get('/adminRemoveTaskFromRole', 'App\Http\Controllers\AdminController@adminRemoveTaskFromRole');
Route::post('/adminRemoveTaskFromRole', 'App\Http\Controllers\AdminController@submitRemoveTaskFromRole');
Route::get('/RemoveTaskRole', 'App\Http\Controllers\AdminController@getTaskToRole');
// Route::post('/adminRemoveTaskFromRole', 'App\Http\Controllers\AdminController@submitRemoveTaskFromRole');

// Add roles to admin
Route::get('/roleToAdmin', 'App\Http\Controllers\AdminController@roleToAdmin');
Route::post('/roleToAdmin', 'App\Http\Controllers\AdminController@submitRoleToAdmin');
Route::get('/getRoles', 'App\Http\Controllers\AdminController@getRoleAdmin');

//Remove role(s) from admin
Route::get('/removeRoleFromAdmin', 'App\Http\Controllers\AdminController@removeRoleFromAdmin');
Route::post('/removeRoleFromAdmin', 'App\Http\Controllers\AdminController@submitRemoveRoleFromAdmin');
Route::get('/RemoveAdminRole', 'App\Http\Controllers\AdminController@getRoleToAdmin');

Route::get('/logout', 'App\Http\Controllers\AdminController@logoutAdmin');

Route::get('/adminallUsers', 'App\Http\Controllers\AdminController@adminAllUsers');
Route::post('/resetuserspassword', 'App\Http\Controllers\AdminController@resetuserspassword');
Route::post('/resetadminpassword', 'App\Http\Controllers\AdminController@resetadminpassword');
Route::get('/editusers/{id}', 'App\Http\Controllers\AdminController@editusers');
Route::post('/editusersinfo', 'App\Http\Controllers\AdminController@editusersinfo');

Route::get('/adminallApplicants', 'App\Http\Controllers\AdminController@allApplicants');
Route::get('/allApprovedApplicants/{allApprovedApplicants}', 'App\Http\Controllers\AdminController@allApprovedApplicants');

Route::get('/adminutme', 'App\Http\Controllers\AdminController@utme');
Route::get('/adminde', 'App\Http\Controllers\AdminController@DE');
Route::get('/adminpg', 'App\Http\Controllers\AdminController@PG');
Route::get('/admintransfer', 'App\Http\Controllers\AdminController@transfer');

Route::get('/transferPayment', 'App\Http\Controllers\AdminController@transferPayment');
Route::get('/utmePayment', 'App\Http\Controllers\AdminController@utmePayment');
Route::get('/dePayment', 'App\Http\Controllers\AdminController@dePayment');
Route::get('/pgPayment', 'App\Http\Controllers\AdminController@pgPayment');
Route::get('/adminAllPayments', 'App\Http\Controllers\AdminController@adminAllPayments');

Route::get('/qualified/{type}', 'App\Http\Controllers\AdminController@viewQualifiedApplicants');
Route::get('/recommended/{recommended}', 'App\Http\Controllers\AdminController@viewRecommendedApplicants');
Route::get('/unqualified/{type}', 'App\Http\Controllers\AdminController@viewAllUnqualifiedApplicants');

Route::get('/forceApproval/{forceApproval}/{forceApprovalConfirm}', 'App\Http\Controllers\AdminController@forceApproved');

Route::get('/approveAll/{approveAll}', 'App\Http\Controllers\AdminController@approveAllQualifiedApplicants');
Route::get('/rejectAll/{rejectAll}', 'App\Http\Controllers\AdminController@rejectAllUnqualifiedApplicants');

Route::get('/recommend/{recommend}/{recommendConfirm}', 'App\Http\Controllers\AdminController@recommend');
Route::GET('/approval/{approval}/{approvalConfirm}', 'App\Http\Controllers\AdminController@approved');
// Route::post('/approval/{approval}/{approvalConfirm}', 'App\Http\Controllers\AdminController@approved');
// Route::post('/comment', 'App\Http\Controllers\AdminController@comment');

Route::post('/approval', 'App\Http\Controllers\AdminController@approved');
Route::get('/rejection/{rejection}/{rejectionConfirm}', 'App\Http\Controllers\AdminController@rejection');

Route::get('/adminView/{adminView}/{adminConfirm}', 'App\Http\Controllers\AdminController@viewApplicants');

Route::post('/adminPgFilter', 'App\Http\Controllers\AdminController@filterPgApplicants');
Route::post('/adminUtmeFilter', 'App\Http\Controllers\AdminController@filterUtmeApplicants');
Route::post('/adminDeFilter', 'App\Http\Controllers\AdminController@filterDeApplicants');
Route::post('/adminTransferFilter', 'App\Http\Controllers\AdminController@filterTransferApplicants');

//View all admins
Route::get('/viewAdmins', 'App\Http\Controllers\AdminController@viewAdmins');
Route::get('/viewAdmins/{adminID}', 'App\Http\Controllers\AdminController@deleteAdmin');


Route::post('/verifypayment', 'App\Http\Controllers\AdminController@verifypayment');
Route::post('/pgverifypayment', 'App\Http\Controllers\AdminController@pgverifypayment');
Route::post('/changecourse', 'App\Http\Controllers\AdminController@changecourse');
Route::post('/changecourseDE', 'App\Http\Controllers\AdminController@changecourseDE');

// ADD NEW SERVICE TYPE ROUTE
// Route::get('/newServiceType', 'App\Http\Controllers\AdminController@addRemitaServiceType');

Route::get('/addRemitaServiceType', 'App\Http\Controllers\AdminController@viewaddRemitasServiceType');
Route::post('/addRemitaServiceType', 'App\Http\Controllers\AdminController@addRemitaServiceType');

Route::get('/viewRemitaServiceType', 'App\Http\Controllers\AdminController@viewRemitaServiceType');
Route::post('/viewRemitaServiceType', 'App\Http\Controllers\AdminController@viewRemitaServiceType');

Route::get('/editRemitaServiceType/{id}', 'App\Http\Controllers\AdminController@editRemitaServiceType');
Route::post('/editRemitaServiceTypefee', 'App\Http\Controllers\AdminController@editRemitaServiceTypefee');
Route::post('/suspendRemitaServiceType', 'App\Http\Controllers\AdminController@suspendRemitaServiceType');
Route::post('/activeRemitaServiceType', 'App\Http\Controllers\AdminController@activeRemitaServiceType');
Route::get('/adminView/{adminView}/{adminConfirm}', 'App\Http\Controllers\AdminController@viewApplicants');

// Bursary routes
Route::get('/bursary/upload', 'BursaryController@upload')->name('bursary.upload');

Route::post('/bursary/import', 'BursaryController@import')->name('bursary.import');

Route::get('/bursary/search', 'BursaryController@search')->name('bursary.search');

Route::post('/bursary/find', 'BursaryController@find')->name('bursary.find');


//Remita routes
Route::get('/bursary/remita/search', 'App\Http\Controllers\RemitaController@search')->name('remita.search-rrr');

Route::post('/bursary/remita/find', 'App\Http\Controllers\RemitaController@find')->name('remita.find-rrr');

Route::get('/bursary/remita/print/{id}', 'App\Http\Controllers\RemitaController@printRRR')->name('remita.print-rrr');

Route::get('/bursary/remita/', 'App\Http\Controllers\RemitaController@index')->name('remita.index');

Route::post('/bursary/remita/find-date', 'App\Http\Controllers\RemitaController@findDate')->name('remita.find-date');

Route::get('/bursary/remita/fee-types', 'App\Http\Controllers\RemitaController@feeTypes')->name('remita.fee-types');
Route::get('/bursary/remita/fee-typesrrr', 'App\Http\Controllers\RemitaController@feeTypesrrr')->name('remita.fee-typesrrr');

Route::get('/bursary/remita/fee-type/{fee_type_id}', 'App\Http\Controllers\RemitaController@feeType')->name('remita.fee-type');
Route::get('/bursary/remita/fee-typerrr/{fee_type_id}', 'App\Http\Controllers\RemitaController@feeTyperrr')->name('remita.fee-typerrr');

Route::post('/bursary/remita/find-student', 'App\Http\Controllers\RemitaController@findStudent')->name('remita.find-student');

// Bursary routes
// require_once "bursary.php";


// Route::group(['middleware' => ['/admin']], function () {
//     return view('administratorHome');
// });


//students login route
Route::get('/studentsLogin', function () {
    return view('students.studentsLogin');
});
// Route::get('/students/home', function () {
//     return view('students.home');
// });

// Route::post('/studentsLogin', 'App\Http\Controllers\StudentController@StudentLogin');
// Route::get('/course-registration', 'App\Http\Controllers\StudentsController@course_Registration');
// Route::post('/course-reg', 'App\Http\Controllers\StudentsController@course_Reg');
// Route::post('/dropcourse-reg', 'App\Http\Controllers\StudentsController@dropcourse_Reg');
// Route::get('/courseform', 'App\Http\Controllers\StudentsController@courseform');


// // ProgramCourses routes
// require_once "program_courses.php";

// // Courses routes
// require_once "courses.php";


// // Academic Departments routes
// require_once "academic_departments.php";

// // Staff routes
// require_once "staff.php";

// // Admin Students routes
// require_once "admin_students.php";

// // Colleges routes
// require_once "colleges.php";

// // Programs routes
// require_once "programs.php";


// Student routes
// require_once "students.php";







