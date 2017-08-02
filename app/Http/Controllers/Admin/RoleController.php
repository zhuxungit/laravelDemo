<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Role;
use DB;//引入db
use Input;

class RoleController extends Controller
{
    //角色列表
    public function index()
    {
        //查询数据
        $data = Role::get();
        return view('admin.role.index', ['data' => $data]);
    }

    //分派权限
    public function assignAuth()
    {
        //判断请求的数据类型
        if (Input::method() == 'POST') {
            $data = Input::all();

            //调用模型
            $role = new Role();
            //数据更新
            $result = $role->saveUpdate($data['id'], $data['auth']);
            return $result;
//            dd($result);

        } else {
            //查询真实权限数据
            $topAuth = DB::table('auth')->where('pid', '0')->get();
            $cateAuth = DB::table('auth')->where('pid', '>', '0')->get();

            $auth = Role::select('auth_ids') -> where('id',Input::get('id')) -> get() -> toArray();

//            p($auth);

            //展示模板和数据
            return view('admin.role.assignAuth', ['topAuth' => $topAuth, 'cateAuth' => $cateAuth,'auth'=>$auth]);
        }

    }
}
