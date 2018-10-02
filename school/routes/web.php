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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@index')->name('admin.home');
});
Route::get('/reg', ['as'=>'reg','uses'=>'Auth\AdminRegController@reg']);
Route::post('/reg', ['as'=>'regPost','uses'=>'Auth\AdminRegController@create']);*/

/* ------------------ admins -----------------------*/
Route::prefix('admin')->group(function() {
	Route::get('/login', ['as'=>'LoginAdmin','uses'=>'AuthController@showLoginForm']);
	Route::post('/login', ['as'=>'LoginAdminPost','uses'=>'AuthController@login']);
	Route::get('/logout', ['as'=>'LogoutAdmin','uses'=>'AuthController@logout']);

	Route::get('/home', ['as'=>'home','uses'=>'Auth\AdminController@home']);

	Route::get('/List', ['as'=>'ListAdmin','uses'=>'Auth\AdminController@get_list']);

	Route::get('/Add', ['as'=>'AddAdmin','uses'=>'Auth\AdminController@get_add']);
	Route::post('/Add', ['as'=>'AddPostAdmin','uses'=>'Auth\AdminController@post_add']);

	Route::get('/Edit/{id}', ['as'=>'EditAdmin','uses'=>'Auth\AdminController@get_edit']);
	Route::post('/Edit/{id}', ['as'=>'EditAdminPost','uses'=>'Auth\AdminController@post_edit']);

	Route::get('/Delete/{id}', ['as'=>'DeleteAdmin','uses'=>'Auth\AdminController@delete']);
});
/* ------------------ departments -----------------------*/
Route::prefix('department')->group(function() {
	Route::get('/List', ['as'=>'departmentList','uses'=>'DepartmentsController@get_list']);

	Route::get('/Add', ['as'=>'departmentAdd','uses'=>'DepartmentsController@get_add']);
	Route::post('/Add', ['as'=>'departmentAddPost','uses'=>'DepartmentsController@post_add']);

	Route::get('/Edit/{id}', ['as'=>'departmentEdit','uses'=>'DepartmentsController@get_edit']);
	Route::post('/Edit/{id}', ['as'=>'departmentEditPost','uses'=>'DepartmentsController@post_edit']);

	Route::get('/Delete/{id}', ['as'=>'departmentDelete','uses'=>'DepartmentsController@delete']);
});

/* ------------------ classes -----------------------*/
Route::prefix('class')->group(function() {
	Route::get('/List/{id}', ['as'=>'classList','uses'=>'ClassesController@get_list']);

	Route::get('/Add/{id}', ['as'=>'classAdd','uses'=>'ClassesController@get_add']);
	Route::post('/Add/{id}', ['as'=>'classAddPost','uses'=>'ClassesController@post_add']);

	Route::get('/Edit/{classId}/{departmentId}', ['as'=>'classEdit','uses'=>'ClassesController@get_edit']);
	Route::post('/Edit/{classId}/{departmentId}', ['as'=>'classEditPost','uses'=>'ClassesController@post_edit']);

	Route::get('/Delete/{id}', ['as'=>'classDelete','uses'=>'ClassesController@delete']);
});
/* ------------------ students -----------------------*/
Route::prefix('student')->group(function() {
	Route::get('/List/{id}', ['as'=>'studentList','uses'=>'StudentsController@get_list']);

	Route::get('/Add/{id}', ['as'=>'studentAdd','uses'=>'StudentsController@get_add']);
	Route::post('/Add/{id}', ['as'=>'studentAddPost','uses'=>'StudentsController@post_add']);

	Route::get('/Edit/{studentId}/{classId}', ['as'=>'studentEdit','uses'=>'StudentsController@get_edit']);
	Route::post('/Edit/{studentId}/{classId}', ['as'=>'studentEditPost','uses'=>'StudentsController@post_edit']);

	Route::get('/Delete/{id}', ['as'=>'studentDelete','uses'=>'StudentsController@delete']);
});