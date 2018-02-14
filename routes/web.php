<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', 'AuthController@showRegister')->name('showRegister');
Route::post('register', 'AuthController@register')->name('register');
Route::get('login', 'AuthController@showLogin')->name('showLogin');
Route::post('login', 'AuthController@login')->name('login');
Route::post('logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/scripts', 'ScriptsController@index');
    Route::get('/scripts/dataTable', 'ScriptsController@dataTable');
    Route::get('/scripts/articlesTable', 'ArticlesController@articlesTable');
    Route::get('/scripts/map', 'ScriptsController@map');

    Route::get('/articles', 'ArticlesController@index');
    Route::get('/articles/create', 'ArticlesController@create');
    Route::post('/articles', 'ArticlesController@store');
    Route::get('/articles/{article}', 'ArticlesController@show');
    Route::get('/articles/{article}/edit', 'ArticlesController@edit');
    Route::put('/articles/{article}', 'ArticlesController@update');
    Route::delete('/articles/{article}', 'ArticlesController@destroy');
    Route::get('/categories/{category}/articles', 'ArticlesController@categoryIndex');

    Route::get('/categories', 'CategoriesController@index');
    Route::get('/categories/create', 'CategoriesController@create');
    Route::post('/categories', 'CategoriesController@store');
    Route::get('/categories/{category}', 'CategoriesController@show');
    Route::get('/categories/{category}/edit', 'CategoriesController@edit');
    Route::put('/categories/{category}', 'CategoriesController@update');
    Route::delete('/categories/{category}', 'CategoriesController@destroy');

    Route::post('/articles/{article}/comments', 'CommentsController@store');

    Route::get('/sql', 'ArticlesController@sqlIndex');

     });