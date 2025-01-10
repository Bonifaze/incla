<?php

// Website  Routes

//SLIDER SECTION
Route::get('/website/slider', 'WebsiteController@slider')->name('slider');
Route::get('/website/sliderSRA', 'WebsiteController@sliderSRA')->name('sliderSRA');
Route::get('/website/sliderNFCS', 'WebsiteController@sliderNFCS')->name('sliderNFCS');

Route::patch('/update-slider/{id}','WebsiteController@sliderupdate')->name('slider.update');

Route::post('/store-slider','WebsiteController@sliderstore')->name('slider.store');

//NEWS SECTION
Route::get('/website/news', 'WebsiteController@news')->name('news');
Route::get('/website/newsSRA', 'WebsiteController@newsSRA')->name('newsSRA');
Route::get('/website/newsNFCS', 'WebsiteController@newsNFCS')->name('newsNFCS');

Route::patch('/update-news/{id}','WebsiteController@newsupdate')->name('news.update');

Route::post('/store-news','WebsiteController@newsstore')->name('news.store');

//EVENT SECTION
Route::get('/website/events', 'WebsiteController@events')->name('events');
Route::get('/website/eventsSRA', 'WebsiteController@eventsSRA')->name('eventsSRA');
Route::get('/website/eventsNFCS', 'WebsiteController@eventsNFCS')->name('eventsNFCS');

Route::patch('/update-events/{id}','WebsiteController@eventsupdate')->name('events.update');

Route::post('/store-events','WebsiteController@eventsstore')->name('events.store');
