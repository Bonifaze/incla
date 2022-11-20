<?php
Route::get('/students/create', 'AdminStudentsController@create')->name('student.create');

Route::post('/students/store', 'AdminStudentsController@store')->name('student.store');

Route::get('/students/show/{id}', 'AdminStudentsController@show')->name('student.show');

Route::get('/students/view/{id}', 'AdminStudentsController@view')->name('student.view');

Route::get('/students/edit/{id}', 'AdminStudentsController@edit')->name('student.edit');

Route::patch('/students/edit/{id}', 'AdminStudentsController@update')->name('student.update');

Route::get('/students/list', 'AdminStudentsController@list')->name('student.list');

Route::get('/students/search', 'AdminStudentsController@search')->name('student.search');

Route::post('/students/find', 'AdminStudentsController@find')->name('student.find');

Route::post('/students/find-matric', 'AdminStudentsController@findMatric')->name('student.find_matric');

Route::get('/students/transcript/{encode}', 'AdminStudentsController@transcript')->name('student.transcript');

Route::patch('/students/reset', 'AdminStudentsController@reset')->name('student.reset');

Route::get('/students/list-level/{level}', 'AdminStudentsController@listLevel')->name('student.list_level');

Route::get('/students/list-level-registered/{level}', 'AdminStudentsController@listLevelRegistered')->name('student.list_level_registered');

Route::get('/students/email/{level}', 'AdminStudentsController@emailList')->name('student.email.level');

Route::get('/students-contacts/email/{level}', 'AdminStudentsController@contactEmailList')->name('student.contact_email.level');

Route::get('/students/academic/migrate', 'AdminStudentsController@moveSession')->name('student.move_session');

Route::patch('/students/disable', 'AdminStudentsController@disable')->name('student.disable');




// Student Contacts routes
Route::get('/student-contacts/edit/{id}', 'StudentContactsController@edit')->name('student-contact.edit');

Route::patch('/student-contacts/edit/{id}', 'StudentContactsController@update')->name('student-contact.update');


// Student Academic routes
Route::get('/student-academics/edit/{id}', 'StudentAcademicsController@edit')->name('student-academic.edit');

Route::patch('/student-academics/edit/{id}', 'StudentAcademicsController@update')->name('student-academic.update');


// Student Medical routes
Route::get('/student-medicals/edit/{id}', 'StudentMedicalsController@edit')->name('student-medical.edit');

Route::patch('/student-medicals/edit/{id}', 'StudentMedicalsController@update')->name('student-medical.update');


