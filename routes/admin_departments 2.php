<?php

// Admin Department Routes

use App\Http\Controllers\AdminController;

Route::get('/admin/departments/list', 'AdminDepartmentsController@index')->name('admin.department.list');

Route::get('/admin/departments/create', 'AdminDepartmentsController@create')->name('admin.department.create');

Route::post('/admin/departments/store', 'AdminDepartmentsController@store')->name('admin.department.store');

Route::get('/admin/departments/edit/{id}', 'AdminDepartmentsController@edit')->name('admin.department.edit');

Route::patch('/admin/departments/edit/{id}', 'AdminDepartmentsController@update')->name('admin.department.update');

Route::delete('/admin/departments/delete', 'AdminDepartmentsController@delete')->name('admin.department.delete');

Route::get('/admin/departments/staff-list/{dept_id}', 'AdminDepartmentsController@staffList')->name('admin.department.staff_list');

Route::get('/staff-course/approve', [AdminController::class, 'approve'])->name('course.approve');
Route::get('/staff-course/revoke', [AdminController::class, 'revoke'])->name('course.revoke');
