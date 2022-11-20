<?php


// College routes

Route::get('/academia/colleges/create', 'CollegesController@create')->name('academia.college.create');

Route::post('/academia/colleges/store', 'CollegesController@store')->name('academia.college.store');

Route::get('/academia/colleges/edit/{id}', 'CollegesController@edit')->name('academia.college.edit');

Route::patch('/academia/colleges/edit/{id}', 'CollegesController@update')->name('academia.college.update');

Route::get('/academia/colleges/list', 'CollegesController@index')->name('academia.college.list');

Route::delete('/academia/colleges/delete', 'CollegesController@delete')->name('academia.college.delete');

Route::get('/academia/colleges/programs', 'CollegesController@programs')->name('academia.college.programs');

Route::get('/academia/colleges/program/manage/{id}', 'CollegesController@manageProgram')->name('academia.college.manage_program');

Route::get('/academia/colleges/program-level-students/{id}/{level}', 'CollegesController@programLevelStudents')->name('academia.college.program_level_students');

Route::get('/academia/colleges/program-level-courses/{id}/{level}', 'CollegesController@programLevelCourses')->name('academia.college.program_level_courses');

