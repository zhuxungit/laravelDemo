<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\UserModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //登录
    public function login()
    {
        return view('admin.public.login');
    }

    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3|max:20',
            'password' => 'required|min:6|max:32',
            'captcha' => 'required|size:5',
        ]);
        //验证用户账号的合法性（查询数据库）
        $data = $request->only('username', 'password');
//        p($data);
        $result = Auth::guard('admin')->attempt($data, $request->get('online'));
        if ($result) {
//            echo '登录成功';
            return redirect('/admin/index/index');
        } else {
//            echo '登录失败';
            return redirect('/admin/public/login')->withErrors([
                'loginError' => '用户名或密码错误'
            ]);
        }

    }


    //退出登录
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/public/login');
    }

}
