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
Route::any('login', 'LoginController@login');
//后台首页
Route::any('adminIndex', 'AdminController@index');
Route::get('welcome', 'AdminController@welcome');
//品牌页面
Route::get('brand', 'BrandController@index');

Route::get('adIndex','AdminController@index')->middleware('auth');
