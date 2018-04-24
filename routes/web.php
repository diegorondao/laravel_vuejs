<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){
	Route::resource('artigos', 'ArtigosController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
