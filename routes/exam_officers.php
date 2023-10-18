<?php

///Exam Officers

Route::get('/results/program-search-student', 'StudentResultsController@programSearchStudent')->name('result.program_search_student');

Route::post('/results/program-find-student', 'StudentResultsController@programFindStudent')->name('result.program_find_student');

Route::get('/results/semester-remark/{student_id_encoded}', 'StudentResultsController@semesterRemark')->name('result.semester.remark');

Route::post('/results/add_semester_remark', 'StudentResultsController@addSemesterRemark')->name('result.add_semester_remark');

Route::delete('/results/remove-semester-remark', 'StudentResultsController@removeSemesterRemark')->name('result.remove_semester_remark');

Route::get('/results/student/history/{encode}', 'StudentResultsController@history')->name('result.student.history');

Route::get('/exam-officer/programs', 'ExamOfficersController@programs')->name('exam_officer.program');

Route::get('/exam-officer/program/manage/{encode}', 'ExamOfficersController@manageProgram')->name('exam_officer.manage_program');

Route::get('/exam-officer/program-level-courses/{id}/{level}', 'ExamOfficersController@programLevelCourses')->name('exam_officer.program_level_courses');

Route::patch('/results/brought_forward_cgpa', 'ExamOfficersController@broughtForwardCGPA')->name('result.brought_forward_cgpa');

//spotlight

Route::get('/results/programSearchStudentSpotlight', 'StudentResultsController@programSearchStudentSpotlight')->name('result.programSearchStudentSpotlight');

Route::post('/results/programFindStudentSpotlight', 'StudentResultsController@programFindStudentSpotlight')->name('result.programFindStudentSpotlight');

Route::get('/results/modifySpotlight', 'StudentResultsController@modifyResultSpotlight')->name('result.modifySpotlight');
