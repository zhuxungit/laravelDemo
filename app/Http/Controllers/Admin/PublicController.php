<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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
        $data = $request->only('username','password');
        $result = Auth::guard('admin')->attempt($data,$request->get('online'));
        if ($result) {
            return redirect('/admin/index/index');
        }else{
            return redirect('/admin/public/login')->withErrors([
                'loginError'=>'用户名或密码错误',
            ]);
        }
    }
}
