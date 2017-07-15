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
//后台登录
Route::get('/admin/public/login','Admin\PublicController@login');
//登录处理路由
Route::post('/admin/public/checkLogin','Admin\PublicController@checkLogin');

//添加后台首页的路由
Route::get('/admin/index/index', 'Admin\IndexController@index');
Route::get('/admin/index/welcome', 'Admin\IndexController@welcome');
//
//Route::group(['middleware' => 'auth:admin'], function () {
//    //添加后台首页的路由
//    Route::any('adminIndex', 'AdminController@index');
//    Route::get('welcome', 'AdminController@welcome');
//    //退出登录
//    Route::get('logout', 'LoginController@logout');
//    //品牌页面
//    Route::get('brand', 'BrandController@index');
//    Route::post('brand/ajaxLst','BrandController@ajaxLst');
//    Route::any('brand/brandAdd','BrandController@brandAdd');
//});