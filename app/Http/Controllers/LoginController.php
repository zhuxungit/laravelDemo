<?php

namespace App\Http\Controllers;

use App\Http\Model\userModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登录
    public function login()
    {

//        var_dump(encrypt('123456'));die;


        //接收用户提交的用户名，密码，是否保持登录
        if ($userInfo = Input::all()) {
//            dd($_POST);
//            exit;
            $info = userModel::login($userInfo['username'],$userInfo['password']);

//            var_dump($info);die;

            if ($info === true) {
                //密码验证成功则直接跳转
                return redirect()->to('/');
            }else {
                //出错，提示错误信息
                return back()->with('msg',$info);
            }
        }

        return view('admin.login.login');
    }
}
