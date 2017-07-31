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
    public function index(){
    	//查询数据
        $data = Role::get();
        return view('admin.role.index',['data'=>$data]);
    }

    //分派权限
    public function assignAuth(){
//    	//判断请求类型
//    	if(Input::method() == 'POST'){
//    		$data = Input::all();
//    		//调用模型
//    		$role = new Role();
//    		//调用自定义的方法处理数据并且进行数据更新
//    		$result = $role -> saveUpdate($data['id'],$data['auth']);
//    		return $result;
//    	}else{
//    		//查询真实权限数据
//	    	$topAuth = DB::table('auth') -> where('pid','0') -> get();
//	    	$cateAuth = DB::table('auth') -> where('pid','>','0') -> get();
//	    	//查询该角色当前所拥有的权限信息
//	    	$auth = Role::select('auth_ids') -> where('id',Input::get('id')) -> get() -> toArray();
//	    	//dd($auth);die;
//	    	//展示模版和数据
//	    	return view('admin.role.assignAuth',['topAuth' => $topAuth,'cateAuth' => $cateAuth,'auth' => $auth]);
//    	}
        //查询真实权限数据
        $topAuth = DB::table('auth')->where('pid','0')->get();
        $cateAuth = DB::table('auth')->where('pid','>','0')->get();
        //展示模板和数据
        return view('admin.role.assignAuth',['topAuth'=>$topAuth,'cateAuth'=>$cateAuth]);
    }
}
