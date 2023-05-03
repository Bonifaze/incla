<?php

// Student Result Routes

Route::get('/results/search-student', 'StudentResultsController@searchStudent')->name('result.search_student');

Route::post('/results/find-student', 'StudentResultsController@findStudent')->name('result.find_student');

Route::get('/results/manage-student/{id}', 'StudentResultsController@manageStudent')->name('result.manage_student');

Route::post('/results/upload', 'StudentResultsController@upload')->name('result.upload');

Route::post('/results/store', 'StudentResultsController@store')->name('result.store');

Route::post('/results/ict-upload', 'StudentResultsController@ICTUpload')->name('result.ict_upload');

Route::post('/results/ict-store', 'StudentResultsController@ICTStore')->name('result.ict_store');

Route::get('/results/semester/{student_id}/{session_id}/{semester}', 'StudentResultsController@semesterResult')->name('result.semester_result');
Route::get('/results/modify', 'StudentResultsController@modifyResult')->name('result.modify');
Route::post('/results/update', 'StudentResultsController@updateResult')->name('result.update');

// Admin Course Registration Routes

Route::post('/results/registration', 'StudentResultsController@registration')->name('result.registration');

Route::get('/results/register/{student_id}/{session_id}/{semester}/{level}', 'StudentResultsController@register')->name('result.register');

Route::post('/results/remove-course', 'StudentResultsController@removeRegisteredCourse')->name('result.remove-course');

Route::post('/results/admindropcourse-reg', 'StudentResultsController@admindropcourse_Reg')->name('result.admindropcourse');

Route::delete('/results/delete', 'StudentResultsController@delete')->name('result.delete');


Route::post('/results/add-course', 'StudentResultsController@addCourse')->name('result.add-course');

Route::get('/results/course-form', 'StudentResultsController@courseForm')->name('result.course-form');


// Semester Registration routes
Route::get('/semester/registration/{encode}/{session}', 'SemesterRegistrationsController@registration')->name('semester.registration');

Route::get('/results/excess/{encode}', 'SemesterRegistrationsController@modifyExcess')->name('semester.registration.modify-excess');

Route::patch('/results/excess/{encode}', 'SemesterRegistrationsController@updateExcess')->name('semester.registration.update-excess');

Route::get('/results/coursesReg-student/{id}', 'StudentResultsController@coursesRegStudent')->name('result.coursesReg_student');

Route::post('/results/courseRegStudentForm', 'StudentResultsController@courseRegStudentForm')->name('result.courseRegStudentForm');

//02-05-2023

//
