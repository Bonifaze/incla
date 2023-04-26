<?php

// Academic Department routes

Route::get('/academia/departments/create', 'AcademicDepartmentsController@create')->name('academia.department.create');

Route::post('/academia/departments/store', 'AcademicDepartmentsController@store')->name('academia.department.store');

Route::get('/academia/departments/edit/{id}', 'AcademicDepartmentsController@edit')->name('academia.department.edit');

Route::patch('/academia/departments/edit/{id}', 'AcademicDepartmentsController@update')->name('academia.department.update');

Route::get('/academia/departments/list', 'AcademicDepartmentsController@index')->name('academia.department.list');

Route::delete('/academia/departments/delete', 'AcademicDepartmentsController@delete')->name('academia.department.delete');


Route::get('/academia/departments/programs', 'AcademicDepartmentsController@programs')->name('academia.department.programs');

Route::get('/academia/departments/program/manage/{encode}', 'AcademicDepartmentsController@manageProgram')->name('academia.department.manage_program');

Route::get('/academia/departments/program-level-students/{id}/{level}', 'AcademicDepartmentsController@programLevelStudents')->name('academia.department.program_level_students');

Route::get('/academia/departments/program-level-courses/{id}/{level}', 'AcademicDepartmentsController@programLevelCourses')->name('academia.department.program_level_courses');

Route::get('/academia/departments/program/result/{id}/{level}', 'AcademicDepartmentsController@programLevelResults')->name('academia.department.program_level_results');

Route::get('/academia/departments/program/result/download/{id}/{level}', 'AcademicDepartmentsController@programLevelResultsDownload')->name('academia.department.program_level_results_download');

Route::get('/academia/departments/export', 'AcademicDepartmentsController@export')->name('academia.department.export');

// Route::get('/academia/departments/export-view/{id}/{level}/{semester}', 'AcademicDepartmentsController@exportView')->name('academia.department.export_view');
Route::get('/academia/departments/export-pdf/{id}/{level}/{semester}', 'AcademicDepartmentsController@generatePDF')->name('academia.department.generatePDF');

Route::get('/academia/departments/export-view/{id}/{level}/{semester}', 'AcademicDepartmentsController@exportView')->name('academia.department.export_view');

Route::get('/academia/departments/export-view', 'AcademicDepartmentsController@exportViewoldresult')->name('academia.department.export_view_oldresult');

