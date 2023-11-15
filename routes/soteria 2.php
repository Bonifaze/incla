<?php


Route::get('/soteria/home', 'SoteriaController@home')->name('soteria.home');

Route::post('/soteria/add', 'SoteriaController@add')->name('soteria.add');

Route::get('/soteria/add-staff/{staff_id}', 'SoteriaController@addStaff')->name('soteria.add_staff');

Route::post('/soteria/staff/store', 'SoteriaController@storeStaff')->name('soteria.staff.store');

Route::get('/soteria/list', 'SoteriaController@index')->name('soteria.list');

Route::get('/soteria/edit/{device_id}', 'SoteriaController@edit')->name('soteria.edit');

Route::patch('/soteria/edit/{device_id}', 'SoteriaController@update')->name('soteria.update');

Route::delete('/soteria/delete', 'SoteriaController@delete')->name('soteria.delete');

Route::get('/soteria/add-student/{student_id}', 'SoteriaController@addStudent')->name('soteria.add_student');

Route::post('/soteria/student/store', 'SoteriaController@storeStudent')->name('soteria.student.store');

Route::get('/soteria/official/create', 'SoteriaOfficialsController@create')->name('soteria.official.create');

Route::post('/soteria/official/store', 'SoteriaOfficialsController@store')->name('soteria.official.store');

Route::get('/soteria/download/dhcp', 'SoteriaController@dhcp')->name('soteria.dhcp');

Route::get('/soteria/search', 'SoteriaController@search')->name('soteria.search');

Route::post('/soteria/find', 'SoteriaController@find')->name('soteria.find');

Route::get('/soteria/admin-edit/{device_id}', 'SoteriaController@adminEdit')->name('soteria.admin_edit');

Route::patch('/soteria/admin-edit/{device_id}', 'SoteriaController@adminUpdate')->name('soteria.admin_update');





