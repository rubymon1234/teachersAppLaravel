<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//CMS

Route::group(['prefix' => '/'], function () {
	Route::get('/','Web\HomeController@home')->name('listing');
	Route::get('/mission-aims', 'HomeController@aims')->name('aims');
	Route::get('/about-us', 'HomeController@aboutUs')->name('aboutUs');
	Route::get('/contact-us', 'HomeController@contactUs')->name('contactUs');

	Route::post('/login', 'Auth\AuthController@login')->name('login');
	Route::get('/login', 'Auth\AuthController@index')->name('login');
	Route::post('/ajaxlogin', 'Auth\AuthController@ajaxlogin')->name('ajaxlogin');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('/home', 'Web\HomeController@home')->name('home');
	Route::get('owner/home','Auth\AuthController@otherlanding')->middleware(['permission:owner.home']);
	Route::get('/home', 'Web\HomeController@home')->name('home');
	Route::post('/home', 'Web\HomeController@posthome')->name('home');
	Route::post('/register', 'Web\RegisterController@index')->name('register');
    
	//Registration
	Route::get('/register', 'Web\RegisterController@index')->name('register');
	Route::get('/edit_account', 'Web\RegisterController@edit_account')->name('edit_account');
	Route::get('/profile_view', 'Web\RegisterController@profile_view')->name('profile_view');
	Route::post('/verify_email', 'Web\RegisterController@verifyEmail')->name('verifyEmail');
	Route::post('/update_profile', 'Web\RegisterController@update_profile')->name('update_profile');
	Route::get('/register_user', 'Web\RegisterController@register_user')->name('register_user');
	Route::post('/update_user', 'Web\RegisterController@update_user')->name('update_user');
	Route::post('/getStateList', 'Web\RegisterController@getStateList')->name('getStateList');
	Route::post('/getCityList', 'Web\RegisterController@getCityList')->name('getCityList');
	Route::post('/getPanchayathList', 'Web\RegisterController@getPanchayathList')->name('getPanchayathList');
	Route::post('/getPincode', 'Web\RegisterController@getPincode')->name('getPincode');
	Route::post('/update', 'Web\RegisterController@update')->name('update');
	Route::any('/resendotp/{id}', 'Auth\RegisterController@resendotp')->name('resendotp');
	Route::get('/account_details/{id}', 'Web\HomeController@account_details')->name('account_details');
	Route::get('/account_details/contact/{viewerId}', 'Web\HomeController@postAccountDetails')->name('account.details.info');

	Route::get('sendbasicemail','MailController@basic_email');
	Route::get('sendhtmlemail','MailController@html_email');
	Route::get('sendattachmentemail','MailController@attachment_email');

	Route::get('/permission/denid/403', 'Web\HomeController@accessDenied')->name('accessDenied');

	//Gallery
	Route::get('/gallery', 'Web\WebController@galleryView')->name('web.gallery');
	Route::any('/gallery/category', 'Web\WebController@selectCategory')->name('web.selectcategory');
	Route::post('/update_contact', 'Web\ContactController@update_contact')->name('update_contact');
	Route::post('/getMenuList', 'Web\MenuController@getMenuList')->name('getMenuList');
});
