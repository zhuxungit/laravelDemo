<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    /**
     * 登录
     */
    public function login()
    {
        return view('admin.public.login');
    }

    /**
     * 登陆验证
     */
    public function checkLogin(Request $request)
    {
        //字段有效性的基本验证
        $this->validate($request,[
            'username'=>'required|min:3|max:20',
            'password'=>'required|min:6|max:32',
            'captcha'=>'required|size:5|captcha'
        ]);
    }
}
