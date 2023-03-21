<?php

// Program Courses routes

use App\Http\Controllers\ProgramCoursesController;

Route::get('/program-courses/create', 'ProgramCoursesController@create')->name('program_course.create');

Route::post('/program-courses/store', 'ProgramCoursesController@store')->name('program_course.store');

Route::get('/program-courses/list', 'ProgramCoursesController@index')->name('program_course.list');

Route::get('/program-courses/assign_courses', 'ProgramCoursesController@assign')->name('program_course.assign');

Route::post('/program-courses/store2', 'ProgramCoursesController@store2')->name('program_course.store2');

Route::get('/program-courses/list_assign_courses', 'ProgramCoursesController@indexassign')->name('program_course.list_assign_courses');

Route::get('/program-courses/edit/{id}', 'ProgramCoursesController@edit')->name('program_course.edit');

Route::patch('/program-courses/edit/{id}', 'ProgramCoursesController@update')->name('program_course.update');

Route::delete('/program-courses/delete', 'ProgramCoursesController@delete')->name('program_course.delete');

Route::get('/program-courses/search', 'ProgramCoursesController@search')->name('program_course.search');

Route::post('/program-courses/find', 'ProgramCoursesController@find')->name('program_course.find');

Route::get('/program-courses/results/upload/{program_course_id}', 'ProgramCoursesController@studentResults')->name('program_course.student_results');

Route::post('/program-courses/results/store/{program_course_id}', 'ProgramCoursesController@storeStudentsResults')->name('program_course.students_results_store');

Route::patch('/program-courses/results/approval', 'ProgramCoursesController@updateProgramCourseApproval')->name('program_course.approval');

Route::get('/program-courses/result/{program_course_id}', 'ProgramCoursesController@result')->name('program_course.result');

Route::get('/program-courses/students/{program_course_id}', 'ProgramCoursesController@students')->name('program_course.students');

Route::get('/program-courses/change-lecturer/{id}', 'ProgramCoursesController@changeLecturer')->name('program_course.change-lecturer');

Route::post('/program-courses/change-lecturer', 'ProgramCoursesController@updateLecturer')->name('program_course.update-lecturer');

//Route::patch('/program-courses/change-lecturer/{id}', 'ProgramCoursesController@updateLecturer')->name('program_course.update-lecturer');

Route::get('/program-courses/results/excel-download/{program_course_id}', 'ProgramCoursesController@resultsExcelDownload')->name('program_course.results.excel_download');

Route::post('/program-courses/results/excel-upload/', 'ProgramCoursesController@resultsExcelUpload')->name('program_course.results.excel_upload');

Route::get('/program-courses/results/excel-upload/{program_course_id}', 'ProgramCoursesController@resultsUploadExcel')->name('program_course.results.upload_excel');

Route::get('/program-courses/results/vc', 'ProgramCoursesController@VC')->name('program_course.vc');

Route::get('/program-courses/results/sbc', 'ProgramCoursesController@SBC')->name('program_course.sbc');

Route::get('/program-courses/results/vc/{level}', 'ProgramCoursesController@VCLevel')->name('program_course.vc_level');

Route::get('/program-courses/results/sbc/{level}', 'ProgramCoursesController@SBCLevel')->name('program_course.sbc_level');

Route::post('/program-courses/results/vc/approval', 'ProgramCoursesController@vcApproval')->name('program_course.vc_approval');

Route::get('/program-courses/students-download/{program_course_id}', 'ProgramCoursesController@studentsDownload')->name('program_course.students_download');

Route::get('/program-courses/results/status', 'ProgramCoursesController@resultsStatus')->name('program_course.results_status');

Route::post('/program-courses/get-by-id', [ProgramCoursesController::class, 'getCoursesAndStaff'])->name('get_program_courses_and_staff');

Route::get('/program-course/staff-course/drop/{staff_course_id}', [ProgramCoursesController::class, 'dropStaffCourse'])->name('drop_staff_course');

Route::get('/program-courses/results/ict/{level}', 'ProgramCoursesController@ICTLevel')->name('program_course.ict_level');
