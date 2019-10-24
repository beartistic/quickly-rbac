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

////root
Route::get('/',function () {
        return redirect('parter/index');
    }
);

////parter
Route::group(['namespace' => 'Parter', 'prefix' => 'parter'], function() {
    Route::get('info',  ['as'=>'parter/info', function () {return view('parter.message'); }]);
    Route::get('logout', 'ParterController@doLogout');
    Route::get('register',['as'=>'parter/register', function () {return view('parter.register'); }]);
    Route::post('doregister', 'ParterController@doRegister');
    Route::get('login',['as'=>'parter/login', function () {return view('parter.login'); }]);
    Route::post('dologin', 'ParterController@doLogin');
	Route::get('manual', 'ParterController@manual');
});

Route::group(['namespace' => 'Parter', 'middleware' => ['auth.parter'],'prefix' => 'parter'], function() {
	Route::get('index', 'ParterController@order');
	Route::get('detail', 'ParterController@orderDetail');
	Route::get('deny', 'ParterController@orderDeny');
	Route::get('discard', 'ParterController@orderDiscard');
	Route::get('goods', 'ParterController@goods');
	Route::get('edit', 'ParterController@edit');
	Route::post('doedit', 'ParterController@doEdit');
	Route::get('add', 'ParterController@add');
	Route::post('doadd', 'ParterController@doAdd');
	Route::get('delete', 'ParterController@delete');
    Route::get('pwd',['as'=>'parter/pwd', function () {return view('parter.repwd'); }]);
	Route::post('repwd', 'ParterController@resetPwd');
});

////admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('info',  ['as'=>'admin/info', function () {return view('admin.message'); }]);
    Route::get('logout', 'AdminController@doLogout');
    Route::get('login',['as'=>'admin/login', function () {return view('admin.login'); }]);
    Route::get('register',['as'=>'admin/register', function () {return view('admin.register'); }]);
    Route::post('doregister', 'AdminController@doRegister');
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


//Category
Route::group(['namespace' => 'Product', 'middleware' => ['auth'],'prefix' => 'category'], function() {
    Route::get('getlist', 'CategoryController@getList');
    Route::post('postquery', 'CategoryController@postQuery');
    Route::post('postadd', 'CategoryController@postAdd');
    Route::post('postrow', 'CategoryController@postRow');
    Route::post('postupdate', 'CategoryController@postUpdate');
    Route::post('postdelete', 'CategoryController@postDelete');
    Route::post('postsetting', 'CategoryController@postSetting');
});

//Article
Route::group(['namespace' => 'Product', 'middleware' => ['auth'],'prefix' => 'article'], function() {
    Route::get('getlist', 'ArticleController@getList');
    Route::post('postquery', 'ArticleController@postQuery');
    Route::post('postadd', 'ArticleController@postAdd');
    Route::post('postrow', 'ArticleController@postRow');
    Route::post('postupdate', 'ArticleController@postUpdate');
    Route::post('postdelete', 'ArticleController@postDelete');
    Route::post('postsetting', 'ArticleController@postSetting');
});

    
//Tabloid
Route::group(['namespace' => 'Product', 'middleware' => ['auth'],'prefix' => 'tabloid'], function() {
    Route::get('getlist', 'TabloidController@getList');
    Route::post('postquery', 'TabloidController@postQuery');
    Route::post('postadd', 'TabloidController@postAdd');
    Route::post('postrow', 'TabloidController@postRow');
    Route::post('postupdate', 'TabloidController@postUpdate');
    Route::post('postdelete', 'TabloidController@postDelete');
    Route::post('postsetting', 'TabloidController@postSetting');
});

//Banner
Route::group(['namespace' => 'Product', 'middleware' => ['auth'],'prefix' => 'banner'], function() {
    Route::get('getlist', 'BannerController@getList');
    Route::post('postquery', 'BannerController@postQuery');
    Route::post('postadd', 'BannerController@postAdd');
    Route::post('postrow', 'BannerController@postRow');
    Route::post('postupdate', 'BannerController@postUpdate');
    Route::post('postdelete', 'BannerController@postDelete');
    Route::post('postsetting', 'BannerController@postSetting');
});

//Strategy
Route::group(['namespace' => 'Product', 'middleware' => ['auth'],'prefix' => 'strategy'], function() {
    Route::get('getlist', 'StrategyController@getList');
    Route::post('postquery', 'StrategyController@postQuery');
    Route::post('postadd', 'StrategyController@postAdd');
    Route::post('postrow', 'StrategyController@postRow');
    Route::post('postupdate', 'StrategyController@postUpdate');
    Route::post('postdelete', 'StrategyController@postDelete');
    Route::post('postsetting', 'StrategyController@postSetting');
});

//Topic
Route::group(['namespace' => 'Product', 'middleware' => ['auth'],'prefix' => 'topic'], function() {
    Route::get('getlist', 'TopicController@getList');
    Route::post('postquery', 'TopicController@postQuery');
    Route::post('postadd', 'TopicController@postAdd');
    Route::post('postrow', 'TopicController@postRow');
    Route::post('postupdate', 'TopicController@postUpdate');
    Route::post('postdelete', 'TopicController@postDelete');
    Route::post('postsetting', 'TopicController@postSetting');
});

//Goods
Route::group(['namespace' => 'Product', 'middleware' => ['auth'],'prefix' => 'goods'], function() {
    Route::get('getlist', 'GoodsController@getList');
    Route::post('postquery', 'GoodsController@postQuery');
    Route::post('postadd', 'GoodsController@postAdd');
    Route::post('postrow', 'GoodsController@postRow');
    Route::post('postupdate', 'GoodsController@postUpdate');
    Route::post('postdelete', 'GoodsController@postDelete');
});

//Web
Route::group(['namespace' => 'Web', 'prefix' => 'web'], function() {
    Route::get('index', 'WebController@getList');
    Route::get('category', 'WebController@getCategory');
    Route::get('tag', 'WebController@getTag');
    Route::get('recent', 'WebController@getRecentArticle');
});


//Api
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function() {
    Route::get('products', 'ApiController@getList');
    Route::get('storec', 'ApiController@getStoreCategory');
    Route::get('discoverc', 'ApiController@getDiscoverCategory');
    Route::get('splash', 'ApiController@getSplash');
    Route::get('recommend', 'ApiController@getRecommend');
    Route::get('discovery', 'ApiController@getDiscovery');
    Route::get('strategy', 'ApiController@getStrategy');
    Route::get('ltabloid', 'ApiController@getLatelyTabloid');
    Route::get('rtabloid', 'ApiController@getRandTabloid');
    Route::get('htpl', 'ApiController@getTabloidHtmlTpl');
    Route::get('appapk', 'ApiController@getApkResurl');
    Route::get('comltd', 'ApiController@getComLtdInfo');
	Route::get('search', 'ApiController@searchGoods');
});
