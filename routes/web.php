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
Route::get('/admin/public/login', 'Admin\PublicController@login');
//用户退出
Route::get('/admin/public/logout', 'Admin\PublicController@logout');
//登录处理路由
Route::post('/admin/public/checkLogin', 'Admin\PublicController@checkLogin');

//使用路由群组
Route::group(['middleware' => ['auth:admin', 'checkrbac']], function () {

    //添加后台首页的路由
    Route::get('/admin/index/index', 'Admin\IndexController@index');
    Route::get('/admin/index/welcome', 'Admin\IndexController@welcome');

    //管理员列表
    Route::any('/admin/admin/index/{flag?}', 'Admin\AdminController@index');

    //权限管理部分
    Route::get('/admin/auth/index', 'Admin\AuthController@index');//列表
    Route::any('/admin/auth/add', 'Admin\AuthController@add');//添加

    //角色列表
    Route::get('/admin/role/index', 'Admin\RoleController@index');//列表
    Route::any('/admin/role/assignAuth', 'Admin\RoleController@assignAuth');//分配权限

    //会员管理部分
    Route::get('/admin/member/index','Admin\MemberController@index');//列表
    Route::any('/admin/member/add','Admin\MemberController@add');//会员添加

    //上传
    Route::post('/admin/uploader/webuploader','Admin\UploaderController@webuploader');
});
