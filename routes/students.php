<?php


Route::get('/course-registration', 'StudentsController@courseRegistration')->name('student.course-registration');
Route::post('/course-reg', 'StudentsController@course_Reg')->name('student.course_reg');;
Route::post('/dropcourse-reg', 'StudentsController@dropcourse_Reg')->name('student.dropcourse');;
Route::get('/courseform', 'StudentsController@courseform')->name('student.courseform');;


Route::get('/students/profile', 'StudentsController@profile')->name('student.profile');

Route::get('/students/password', 'StudentsController@password')->name('student.password');

Route::post('/students/change-password', 'StudentsController@changePassword')->name('student.change-password');

Route::get('/students/debt', 'StudentsController@debt')->name('student.debt');

Route::get('/students/transcript', 'StudentsController@transcript')->name('students.transcript');

Route::get('/students/results', 'StudentsController@results')->name('students.results');

// Route::get('/students/semester-result/{encode}', 'StudentsController@semesterResult')->name('student.semester-result');

// Route::get('/students/course-registration2', 'StudentsController@courseRegistration2')->name('student.course-registration2');

// Route::get('/students/evaluation', 'StudentsController@evaluation')->name('student.evaluation');

// Route::get('/evaluation/students/evaluate/{result_id}', 'StudentsController@evaluateResult')->name('student.result-evaluation');

// Route::post('/evaluation/students/evaluate', 'StudentsController@storeEvaluation')->name('student.store-evaluation');

Route::get('/students/contact/edit', 'StudentsController@contactEdit')->name('student.contact-edit');

Route::post('/students/contact/update', 'StudentsController@contactUpdate')->name('student.contact-update');

// Route::get('/students/course-registration', 'StudentsController@courseRegistration')->name('student.course-registration');

// Route::delete('/students/remove-course', 'StudentsController@removeRegisteredCourse')->name('student.remove-course');

// Route::post('/students/add-course', 'StudentsController@addCourse')->name('student.add-course');

// Route::get('/students/closed-course-registration', 'StudentsController@closedCourseRegistration')->name('student.closed-course-registration');

// Route::get('/students/course-form/{encode}', 'StudentsController@courseForm')->name('student.course-form');



//Students Payments
Route::get('/students/remita', 'StudentPaymentsController@remita')->name('student.remita');

Route::get('/students/remita/generate', 'StudentPaymentsController@generateRRR')->name('student.remita-generate');

Route::post('/students/remita/generation', 'StudentPaymentsController@rrrGeneration')->name('student.remita-generation');

Route::post('/students/remita/verify', 'StudentPaymentsController@verifyRRR')->name('student.remita-verify');

// Route::post('/students/remita/pay', 'StudentPaymentsController@pay')->name('student.remita-pay');

Route::get('/students/remita/response', 'StudentPaymentsController@paymentResponse')->name('student.remita-response');

Route::get('/students/remita/confirmation', 'StudentPaymentsController@paymentConfirmation')->name('student.remita-confirm');

Route::post('/students/remita/confirm', 'StudentPaymentsController@confirmationNotification')->name('student.remita-confirm-notify');

Route::get('/students/remita/print/{id}', 'StudentPaymentsController@remitaPrint')->name('student.remita-print');


Route::get('/students/remita/feestype', 'StudentPaymentsController@feespayment')->name('student.feespayment');
Route::get('/students/remita/paymentview/{id}', 'StudentPaymentsController@viewpayment')->name('student.paymentview');
Route::get('/students/receipt/{rrr}', 'StudentPaymentsController@receipt')->name('sudent.receipt');
Route::post('/payremi1', 'StudentPaymentsController@payremi1')->name('sudent.payremi1');


// Route::get('/paymentview/{id}', 'App\Http\Controllers\ApplicantController@Viewpayment');
