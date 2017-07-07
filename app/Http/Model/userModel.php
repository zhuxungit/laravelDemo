<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class userModel extends Model
{
    //设置表的名字
    protected $table = 'user';

    public static function login($username, $password)
    {
        //添加字段的验证规则
        $validator = Validator::make([
            'username' => $username,
            'password' => $password
        ], [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $userMsg = '没有输入用户名或者密码';
        } else {
            //根据用户名。查找数据库的记录
            $userinfo = userModel::where('username',$username)->first();

//            echo '<pre>';
//            var_dump($password);
//            var_dump(decrypt($userinfo->attributes['password']));die;


            if ($userinfo->attributes['username']) {

                //进行密码对比
                if (decrypt($userinfo->attributes['password'])==$password) {

                    $userMsg = true;
                    //验证成功信息保存session
                    session(['user'=>$username]);
                }else{
                     $userMsg = '密码错误';
                }
            }else{
                 $userMsg = '用户名不存在';
            }

        }
        return $userMsg;

    }

}
