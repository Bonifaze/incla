<?php

// Session routes

Route::get('/sessions/create', 'SessionsController@create')->name('session.create');

Route::post('/sessions/store', 'SessionsController@store')->name('session.store');

Route::get('/sessions/edit/{id}', 'SessionsController@edit')->name('session.edit');

Route::patch('/sessions/edit/{id}', 'SessionsController@update')->name('session.update');

Route::get('/sessions/list', 'SessionsController@index')->name('session.list');

Route::patch('/sessions/set-current', 'SessionsController@setCurrent')->name('session.set_current');

