<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //展示管理员列表
    public function index()
    {
        $data = Admin::get();
//        p($data);
        return view("admin.admin.index");
    }

    //获取ajax
    public function loadAdminData()
    {
        //
        $data = Admin::get();
        //返回数据
        return [
            'data'=> $data,
        ];
    }


}
