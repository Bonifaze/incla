<?php

// Program routes

Route::get('/academia/programs/create', 'ProgramsController@create')->name('academia.program.create');

Route::post('/academia/programs/store', 'ProgramsController@store')->name('academia.program.store');

Route::get('/academia/programs/edit/{id}', 'ProgramsController@edit')->name('academia.program.edit');

Route::patch('/academia/programs/edit/{id}', 'ProgramsController@update')->name('academia.program.update');

Route::get('/academia/programs/list', 'ProgramsController@index')->name('academia.program.list');

Route::get('/programs/courses/{id}', 'ProgramsController@courses')->name('academia.program.courses');

Route::delete('/academia/programs/delete', 'ProgramsController@delete')->name('academia.program.delete');
