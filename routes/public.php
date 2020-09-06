<?php

/*
|--------------------------------------------------------------------------
| Web Routes(Public Routes)
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
	Route::get('/mission-aims', 'HomeController@aims')->name('aims');
	Route::get('/about-us', 'HomeController@aboutUs')->name('aboutUs');
	Route::get('/contact-us', 'HomeController@contactUs')->name('contactUs');