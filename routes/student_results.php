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


// Admin Course Registration Routes

Route::post('/results/registration', 'StudentResultsController@registration')->name('result.registration');

Route::get('/results/register/{student_id}/{session_id}/{semester}/{level}', 'StudentResultsController@register')->name('result.register');

Route::delete('/results/remove-course', 'StudentResultsController@removeRegisteredCourse')->name('result.remove-course');

Route::post('/results/add-course', 'StudentResultsController@addCourse')->name('result.add-course');

Route::get('/results/course-form', 'StudentResultsController@courseForm')->name('result.course-form');


// Semester Registration routes
Route::get('/semester/registration/{encode}', 'SemesterRegistrationsController@registration')->name('semester.registration');

Route::get('/results/excess/{encode}', 'SemesterRegistrationsController@modifyExcess')->name('semester.registration.modify-excess');

Route::patch('/results/excess/{encode}', 'SemesterRegistrationsController@updateExcess')->name('semester.registration.update-excess');



//