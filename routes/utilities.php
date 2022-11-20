<?php


Route::get('/utilities/students/contacts/{session_id}', 'UtilitiesController@classOf')->name('student.classof');

Route::get('/utilities/students/contacts/level/{level}', 'UtilitiesController@studentsContactLevel')->name('student.contact.level');

Route::get('/utilities/students/level/{level}', 'UtilitiesController@studentsListLevel')->name('utilities.student.contact.level');

Route::get('/utilities/staff/contacts/teaching', 'UtilitiesController@staffContactTeaching')->name('staff.contact.teaching');

Route::get('/utilities/staff/email/all', 'UtilitiesController@allStaff')->name('staff.email.all');

Route::get('/utilities/mail/letters/vc', 'UtilitiesController@vcLetters')->name('mail.letters.vc');

Route::get('/utilities/staff/email/send', 'UtilitiesController@sendStaff')->name('staff.email.send');

Route::get('/utilities/student/email/send', 'UtilitiesController@sendAllStudents')->name('student.email.send');

Route::get('/utilities/student/email/send-manual', 'UtilitiesController@sendManualStudents')->name('student.email.send_manual');

Route::get('/utilities/student/email/yahoo', 'UtilitiesController@studentsYahooEmail')->name('student.email.yahoo');

Route::get('/utilities/staff/email', 'UtilitiesController@staffEmail')->name('staff.email');

Route::get('/utilities/debt/active', 'UtilitiesController@studentsDebt')->name('student.debt');

Route::get('/utilities/result/suspect', 'UtilitiesController@uploadAssurance')->name('result.assurance');

Route::get('/utilities/result/status/{approval}', 'UtilitiesController@resultUploadStatus')->name('utility.result.status');
