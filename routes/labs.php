<?php
Route::get('/labs/modals', 'LabsController@modals')->name('lab.modals');

Route::get('/labs/nav', 'LabsController@nav')->name('lab.nav');

Route::get('/labs/create-mat', 'LabsController@createMat')->name('lab.create-mat');

Route::get('/labs/check-serial', 'LabsController@checkSerial')->name('lab.check-serial');

Route::get('/labs/check-vuna-email', 'LabsController@checkVunaEmail')->name('lab.check-vuna-email');

Route::get('/labs/semester-registered', 'LabsController@semesterRegistered')->name('lab.semester-registered');

Route::get('/labs/gpa/{student_id}/{session_id}/{semester}', 'LabsController@gpa')->name('lab.gpa');

Route::get('/labs/current-cgpa/{student_id}/{level}/{session_id}/{semester}', 'LabsController@currentCGPA')->name('lab.current-cgpa');

Route::get('/labs/cur-cgpa/{student_id}/{session_id}/{semester}', 'LabsController@curCGPA')->name('lab.cur-cgpa');
