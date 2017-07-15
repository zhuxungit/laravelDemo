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
//
////        echo bcrypt('123456');die;
//
//        //接收用户提交的用户名，密码，是否保持登录
//        if ($request->isMethod('post')) {
//            //获取数据
//            $data = Input::all();
//            //********检验验证码*********
//            //定义验证规则
//            $vali = ['captcha' => 'required|captcha'];
//            //构造需要验证的字段
//            $captcha = ['captcha' => $data['captcha']];
//            //定义错误信息提示
//            $message = [
//                'captcha.required' => '请输入验证码',
//                'captcha.captcha' => '验证码输入有误'
//            ];
//
//            $validator = Validator::make($captcha, $vali, $message);
//
//            if ($validator->fails()) {
//                return back()->withErrors($validator);
//            } else {
//                $auth = Auth::guard('admin')->attempt(['username' => $data['username'], 'password' => $data['password']]);
//                if ($auth) {
//                    //验证成功
//                    return redirect('/adminIndex');
//                } else {
//                    //验证失败返回登录页面
//                    return view('admin.login.login')->withErrors(['password' => '用户名或密码有误']);
//                }
//
//            }
//        }

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
        $data = $request -> only('username','password');
//        p($data);
        $result = Auth::guard('admin')->attempt($data,$request->get('online'));
        if ($result) {
//            echo '登录成功';
            return redirect('/admin/index/index');
        }else{
//            echo '登录失败';
            return redirect('/admin/public/login')->withErrors([
                'loginError'=>'用户名或密码错误'
            ]);
        }

    }


    //退出登录
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }

}
