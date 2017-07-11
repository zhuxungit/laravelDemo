<?php

namespace App\Http\Controllers;

use App\Http\Model\UserModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //登录
    public function login(Request $request)
    {

//        echo bcrypt('123456');die;

        //接收用户提交的用户名，密码，是否保持登录
        if ($request->isMethod('post')) {
            //获取数据
            $data = Input::all();
            //********检验验证码*********
            //定义验证规则
            $vali = ['captcha'=>'required|captcha'];
            //构造需要验证的字段
            $captcha = ['captcha'=>$data['captcha']];
            //定义错误信息提示
            $message = [
                'captcha.required'=>'请输入验证码',
                'captcha.captcha'=>'验证码输入有误'
            ];

            $validator = Validator::make($captcha,$vali,$message);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }else{

//                //验证用户名密码
//                $info = UserModel::login($data);
//
//                if ($info === true) {
//                    //密码验证成功则直接跳转
//                    return redirect()->to('/adminIndex');
//                }else {
//                    //出错，提示错误信息
//                    return back()->withErrors($info);
//                }

                //Auth::guard(指定要使用的guard->attempt(数组形式的用户名和密码);
                //如果验证成功返回true,失败返回false
                $auth = Auth::guard('admin')->attempt(['username'=>$data['username'],'password'=>$data['password']]);
                if ($auth) {
                    //验证成功
                    return redirect('/adminIndex');
                }else{
                    //验证失败返回登录页面
                    return view('admin.login.login')->withErrors(['password'=>'用户名或密码有误']);
                }

            }
        }

        return view('admin.login.login');
    }

    //退出登录
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }

}
