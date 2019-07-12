<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

////default
Route::get('/',function () {
        return redirect('menu/getlist');
    }
);

////admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('info',  ['as'=>'admin/info', function () {return view('admin.message'); }]);
    Route::get('logout', 'AdminController@doLogout');
    Route::get('login',['as'=>'admin/login', function () {return view('admin.login'); }]);
    Route::get('register',['as'=>'admin/register', function () {return view('admin.register'); }]);
    Route::post('dologin', 'AdminController@doLogin');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'],'prefix' => 'admin'], function() {
	Route::get('index', 'AdminController@index');
	
});

//menu
Route::group(['namespace' => 'Zuimei', 'middleware' => ['auth'],'prefix' => 'menu'], function() {
    Route::get('getlist', 'MenuController@getList');
    Route::post('postquery', 'MenuController@postQuery');
    Route::post('postadd', 'MenuController@postAdd');
    Route::post('postrow', 'MenuController@postRow');
    Route::post('postupdate', 'MenuController@postUpdate');
    Route::post('postdelete', 'MenuController@postDelete');
});

//route
Route::group(['namespace' => 'Zuimei', 'middleware' => ['auth'],'prefix' => 'route'], function() {
    Route::get('getlist', 'RouteController@getList');
    Route::post('postquery', 'RouteController@postQuery');
    Route::post('postadd', 'RouteController@postAdd');
    Route::post('postrow', 'RouteController@postRow');
    Route::post('postupdate', 'RouteController@postUpdate');
    Route::post('postdelete', 'RouteController@postDelete');
});

//role
Route::group(['namespace' => 'Zuimei', 'middleware' => ['auth'],'prefix' => 'role'], function() {
    Route::get('getlist', 'RoleController@getList');
    Route::post('postquery', 'RoleController@postQuery');
    Route::post('postadd', 'RoleController@postAdd');
    Route::post('postrow', 'RoleController@postRow');
    Route::post('postupdate', 'RoleController@postUpdate');
    Route::post('postdelete', 'RoleController@postDelete');
    Route::get('setting/{id}', 'RoleController@setting');
    Route::post('postsetting', 'RoleController@postSetting');
});

//user
Route::group(['namespace' => 'Zuimei', 'middleware' => ['auth'],'prefix' => 'user'], function() {
    Route::get('getlist', 'UserController@getList');
    Route::post('postquery', 'UserController@postQuery');
    Route::post('postadd', 'UserController@postAdd');
    Route::post('postrow', 'UserController@postRow');
    Route::post('postupdate', 'UserController@postUpdate');
    Route::post('postdelete', 'UserController@postDelete');
    Route::post('postsetting', 'UserController@postSetting');
});

//userrole
Route::group(['namespace' => 'Zuimei', 'middleware' => ['auth'],'prefix' => 'userrole'], function() {
    Route::get('getlist', 'UserRoleController@getList');
    Route::post('postquery', 'UserRoleController@postQuery');
    Route::post('postadd', 'UserRoleController@postAdd');
    Route::post('postrow', 'UserRoleController@postRow');
    Route::post('postupdate', 'UserRoleController@postUpdate');
    Route::post('postdelete', 'UserRoleController@postDelete');
    Route::post('postsetting', 'UserRoleController@postSetting');
});

