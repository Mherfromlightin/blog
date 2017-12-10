<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/create', 'ArticlesController@create');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/{article}', 'ArticlesController@show');

Route::post('/articles/{article}/comments', 'CommentsController@store');