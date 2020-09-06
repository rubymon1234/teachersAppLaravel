<?php

/*
|--------------------------------------------------------------------------
| Web Routes(Admin Routes)
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
	
	//Admin
	Route::get('/', 'Auth\LoginController@showLoginForm')->name('adminlogin');
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('adminlogin');
	Route::get('home', 'Auth\AuthController@homelanding')->name('adminhome')->middleware(['permission:admin.home']);
	Route::get('', 'Auth\LoginController@showLoginForm')->name('adminlogin');
	Route::get('/password/reset', 'Admin\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	
   // ACL - Roles and Permissions
	Route::get('/role/view', 'Acl\AclController@getViewRole')->name('acl.role.view')->middleware(['permission:acl.role.view']);
	Route::get('/role/create', 'Acl\AclController@getCreateRole')->name('acl.role.manage')->middleware(['permission:acl.role.view']);
	Route::post('/role/create', 'Acl\AclController@postCreateRole')->name('acl.role.manage')->middleware(['permission:acl.role.view']);

	//ASSIGN PERMISSION TO ROLES
	Route::get('role/assign/permissions/{id}', 'Acl\AclController@getPermissionAssign')->name('assign.role.permission')->middleware(['permission:assign.role.permission']);
	Route::post('role/assign/permissions/{id}', 'Acl\AclController@postPermissionAssign')->name('assign.role.permission')->middleware(['permission:assign.role.permission']);

	Route::get('/viewers/listing', 'Admin\UserViewController@getViewerDetail')->name('admin.viewer')->middleware(['permission:admin.viewer']);
	//Permission
	Route::get('/permission/view', 'Acl\AclController@getViewPerms')->name('acl.perms.view');
	Route::get('/permission/create', 'Acl\AclController@getCreatePerms')->name('acl.perms.manage');
	Route::post('/permission/create', 'Acl\AclController@postCreatePerms')->name('acl.perms.manage');
	Route::get('/permission/edit/{id}','Acl\AclController@getEditPerms')->name('acl.perms.edit');
	Route::post('/permission/edit/{id}','Acl\AclController@postEditPerms')->name('acl.perms.edit');
	Route::get('/permission/del/{id}','Acl\AclController@getDelPerms')->name('acl.perms.delete');

	//Manage User
	Route::get('/users/listing', 'Admin\UserViewController@getViewUser')->name('admin.user.listing');
	Route::get('/user/detail/{id}','Admin\UserViewController@getViewDetail')->name('admin.user.detail');

	Route::post('/users/edit/{id}','Admin\UserViewController@postEditUser')->name('admin.user.edit');
	Route::get('/users/del/{id}','Admin\UserViewController@getDelUser')->name('admin.user.delete');
	Route::post('/users/view','Admin\UserViewController@search')->name('admin.user.search');

	//Contact Us
	Route::get('/users/contact-us', 'Admin\UserViewController@getContactUsList')->name('admin.user.contactUs');

	//create an Categories
	Route::get('/event/create-category','Admin\Event\EventController@viewEvent')->name('event.create.category');
	Route::get('/event/view-event','Admin\Event\EventController@eventDetailView')->name('event.view.event');
	
	//create an Event
	Route::get('/event/create-event','Admin\Event\EventController@getEventDetailCreate')->name('event.create.event'); 
	Route::post('/event/create-event','Admin\Event\EventController@postEventDetailCreate')->name('event.create.event');
	Route::get('/event/edit-event/{eventInfoId}','Admin\Event\EventController@getEventDetailEdit')->name('event.edit.event');
});
