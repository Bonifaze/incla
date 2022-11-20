<?php


// Courses routes
Route::get('/courses/create', 'CoursesController@create')->name('course.create');

Route::post('/courses/store', 'CoursesController@store')->name('course.store');

Route::get('/courses/list', 'CoursesController@index')->name('course.list');

Route::get('/courses/edit/{id}', 'CoursesController@edit')->name('course.edit');

Route::patch('/courses/edit/{id}', 'CoursesController@update')->name('course.update');

Route::delete('/courses/delete', 'CoursesController@delete')->name('course.delete');

Route::post('/courses/program-course-get-courses', 'CoursesController@getCourses')->name('course.program_course_get_courses');

Route::post('/courses/program-course-get-course-hours', 'CoursesController@getCourseHours')->name('course.program_course_get_course_hours');

Route::get('/courses/search', 'CoursesController@search')->name('course.search');

Route::post('/courses/find', 'CoursesController@find')->name('course.find');

Route::post('/courses/program-list', 'CoursesController@programList')->name('course.program_list');

