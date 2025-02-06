<?php

Route::group(['middleware' => 'auth:staff'], function () {

Route::get('/staff/list', 'StaffController@index')->name('staff.list');

Route::get('/staff/create', 'StaffController@create')->name('staff.create');

Route::post('/staff/store', 'StaffController@store')->name('staff.store');

Route::get('/staff/show/{id}', 'StaffController@show')->name('staff.show');

Route::get('/staff/view/{id}', 'StaffController@view')->name('staff.view');

Route::get('/staff/security/{id}', 'StaffController@security')->name('staff.security');

Route::get('/staff/securitylist', 'StaffController@securitylist')->name('staff.securitylist');

Route::get('/staff/edit/{id}', 'StaffController@edit')->name('staff.edit');

Route::patch('/staff/edit/{id}', 'StaffController@update')->name('staff.update');

Route::patch('/staff/disable', 'StaffController@disable');

Route::get('/staff/password', 'StaffController@password')->name('staff.password');

Route::post('/staff/change', 'StaffController@change')->name('staff.change');

Route::post('/staff/program-course-get-lecturers', 'StaffController@getLecturers')->name('staff.program_course_get_lecturers');

Route::get('/staff/profile', 'StaffController@profile')->name('staff.profile');

Route::get('/staff/courses', 'StaffController@courses')->name('staff.courses');

Route::get('/staff/search', 'StaffController@search')->name('staff.search');

Route::post('/staff/find', 'StaffController@find')->name('staff.find');

Route::patch('/staff/reset', 'StaffController@reset')->name('staff.reset');

Route::get('/staff/roles', 'StaffController@roles')->name('staff.roles');

Route::get('/staff/email', 'StaffController@email')->name('staff.email');

Route::get('/staff/results', 'StaffController@results')->name('staff.results');


//Staff Contact
Route::get('/staff-contact/edit/{id}', 'StaffContactsController@edit')->name('staff-contact.edit');

Route::patch('/staff-contact/edit/{id}', 'StaffContactsController@update')->name('staff-contact.update');

//Staff Work Profile
Route::get('/staff-work/edit/{id}', 'StaffWorkProfilesController@edit')->name('staff-work.edit');

Route::patch('/staff-work/edit/{id}', 'StaffWorkProfilesController@update')->name('staff-work.update');

Route::delete('/staff/assign/remove/{staffCourse}', 'AdminController@destroy')->name('staff.assign.destroy');

Route::get('/staff/assign/courses', 'AdminController@courseAssigned')->name('staff.assign.courses');

//CLEARNCE
Route::get('/staff/paymentlists', 'StaffController@approvePayments')->name('paymentlists');

Route::post('/staff/remitasverification', 'StaffController@remitasVerification')->name('staff.remitasVerification');

Route::get('/staff/paymentConfirmlists', 'StaffController@confirmPayments')->name('staff.Confirmpaymentlists');

Route::get('/staff/list/studentreport', 'StaffController@staffreport')->name('staff.report');
});
