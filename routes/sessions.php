<?php

// Session routes

Route::get('/sessions/create', 'SessionsController@create')->name('session.create');

Route::post('/sessions/store', 'SessionsController@store')->name('session.store');

Route::get('/sessions/edit/{id}', 'SessionsController@edit')->name('session.edit');

Route::patch('/sessions/edit/{id}', 'SessionsController@update')->name('session.update');

Route::get('/sessions/list', 'SessionsController@index')->name('session.list');

Route::patch('/sessions/set-current', 'SessionsController@setCurrent')->name('session.set_current');

// THIS PART IS FOR ADMISSION SESSION

Route::get('/Admissionssessions/create', 'SessionsController@createAdmission')->name('session.createAdmission');

Route::get('/Admissionsessions/list', 'SessionsController@indexAdmission')->name('session.listAdmission');

Route::post('/Admissionsessions/store', 'SessionsController@storeAdmission')->name('session.storeAdmission');

Route::get('/Admissionsessions/edit/{id}', 'SessionsController@editAdmission')->name('session.editAdmission');

Route::patch('/Admissionsessions/edit/{id}', 'SessionsController@updateAdmission')->name('session.updateAdmission');

Route::patch('/Admissionsessions/set-current', 'SessionsController@setCurrentAdmission')->name('session.set_currentAdmission');

Route::patch('/openAdmissionType', 'SessionsController@openAdmissionType')->name('openAdmissionType');

Route::patch('/closeAdmissionType', 'SessionsController@closeAdmissionType')->name('closeAdmissionType');

Route::patch('/courseReg/setCourseReg', 'SessionsController@setCourseReg')->name('session.setcourseReg');

//THIS PART IS FOR BURSARY SESSION


Route::get('/Bursarysessions/create', 'SessionsController@createBursary')->name('session.createBursary');

Route::get('/Bursarysessions/list', 'SessionsController@indexBursary')->name('session.listBursary');

Route::post('/Bursarysessions/store', 'SessionsController@storeBursary')->name('session.storeBursary');

Route::get('/Bursarysessions/edit/{id}', 'SessionsController@editBursary')->name('session.editBursary');

Route::patch('/Bursarysessions/edit/{id}', 'SessionsController@updateBursary')->name('session.updateBursary');

Route::patch('/Bursarysessions/set-current', 'SessionsController@setCurrentBursary')->name('session.set_currentBursary');

