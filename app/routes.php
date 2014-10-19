<?php

// Home routes
Route::get('/', function() { return View::make('hello'); });

// Search routes
Route::get('search', 'SearchController@home');
Route::get('search/results', 'SearchController@results');

// User routes
Route::get('profile', 'UserController@profile');
Route::get('settings', 'UserController@settings');
Route::get('register', 'UserController@register');
Route::get('logon', 'UserController@logon');

// Project routes
Route::get('projects', 'ProjectController@home');
Route::get('projects/details', 'ProjectController@details');
Route::get('projects/story', 'ProjectController@story'); // Public review of a finished project

// Message routes
Route::get('messages', 'MessageController@home');

// Question routes
Route::get('questions', 'QuestionController@home');
Route::get('questions/details', 'QuestionController@details');
Route::get('questions/add-new', 'QuestionController@create');