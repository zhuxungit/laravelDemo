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

//后台的登录页面
Route::get('/admin/public/login','Admin\PublicController@login');
Route::post('/admin/public/checkLogin','Admin\PublicController@checkLogin');

//后台首页路由
Route::get('/admin/index/index','Admin\Index\IndexController@index');