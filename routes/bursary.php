<?php

// Bursary routes
Route::get('/bursary/upload', 'BursaryController@upload')->name('bursary.upload');

Route::post('/bursary/import', 'BursaryController@import')->name('bursary.import');

Route::get('/bursary/search', 'BursaryController@search')->name('bursary.search');

Route::post('/bursary/find', 'BursaryController@find')->name('bursary.find');


//Remita routes
Route::get('/bursary/remita/searchA', 'RemitaController@searchApplicant')->name('remita.search-rrrA');

Route::post('/bursary/remita/findA', 'RemitaController@findApplicant')->name('remita.find-rrrA');

//applcant
Route::get('/bursary/remita/search', 'RemitaController@search')->name('remita.search-rrr');

Route::post('/bursary/remita/find', 'RemitaController@find')->name('remita.find-rrr');

Route::post('/bursary/remita/verifypayment', 'RemitaController@verifypayment')->name('remita.verifypayment-rrr');


Route::get('/bursary/remita/print/{id}', 'RemitaController@printRRR')->name('remita.print-rrr');

Route::get('/bursary/remita/', 'RemitaController@index')->name('remita.index');

Route::post('/bursary/remita/find-date', 'RemitaController@findDate')->name('remita.find-date');

Route::get('/bursary/remita/fee-types', 'RemitaController@feeTypes')->name('remita.fee-types');

Route::get('/bursary/remita/fee-type/{fee_type_id}', 'RemitaController@feeType')->name('remita.fee-type');

Route::post('/', 'RemitaController@findStudent')->name('remita.find-student');
