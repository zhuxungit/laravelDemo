<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    //设置表的名字
    protected $table = 'user';

//    public static function login($data)
//    {
//        //添加字段的验证规则
//        $validator = Validator::make([
//            'username' => $data['username'],
//            'password' => $data['password']
//        ], [
//            'username' => 'required',
//            'password' => 'required'
//        ]);
//
//        if ($validator->fails()) {
////            p($validator);
//
//            $userMsg['password'] = '没有输入用户名或者密码';
//
//            return $userMsg;
//
//        } else {
//            //根据用户名。查找数据库的记录
//            $userinfo = UserModel::where('username',$data['username'])->first();
//
//            if ($userinfo->attributes['username']) {
//
//                //进行密码对比
//                if (decrypt($userinfo->attributes['password'])==$data['password']) {
//
//                    $userMsg = true;
//                    //验证成功信息保存session
//                    session(['user'=>$data['username']]);
//                }else{
//                     $userMsg['password'] = '密码错误';
//                }
//            }else{
//                 $userMsg['username'] = '用户名不存在';
//            }
//
//        }
//        return $userMsg;
//
//    }

}
