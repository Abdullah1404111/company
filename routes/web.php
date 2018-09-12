<?php

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){

	Route::resource('companies', 'CompaniesController');
	Route::get('admincom', "AdminCompaniesController@index");
	Route::get('adminpro', "AdminCompaniesController@pindex");
	Route::get('adminusers', "AdminCompaniesController@uindex");
	Route::get('adminUserShow', "AdminCompaniesController@ushow");
	Route::get('adminroles', "AdminCompaniesController@urole");
	Route::get('/userss', 'EusarsController@index');

	Route::get('projects/create/{company_id?}', "ProjectsController@create");
	Route::post('addUser', "ProjectUsersController@addUser");
	Route::post('usersAvatars', "ProfileAvatarsController@update_avatar");
	Route::resource('projects', 'ProjectsController');
	Route::resource('roles', 'RolesController');
	Route::resource('tasks', 'TasksController');
	Route::resource('users', 'UsersController');
	Route::resource('comments', 'CommentsController');

});
