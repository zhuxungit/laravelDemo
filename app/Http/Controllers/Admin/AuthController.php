<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;//引入input类
use DB;
class AuthController extends Controller
{
    //权限列表方法
    public function index(){
    	//显示权限列表的数据
    	$data = DB::table('auth') -> get();
    	return view('admin.auth.index',['data' => $data]);
    }

    //权限添加
    public function add(){
    	//判断请求类型
    	if(Input::method() == 'POST'){
    		//post请求提交处理
    		//数据验证
    		$all = Input::all();
    		unset($all['_token']);	//删除token
    		//数据入库
    		$result = DB::table('auth') -> insert($all);
    		return $result ? '1' : '0';
    	}else{
    		//获取顶级权限
    		$permission = DB::table('auth') -> select('id','auth_name') -> where('pid','0') -> get();
    		//展示模版携带需要的参数
    		return view('admin.auth.add',['permission' => $permission]);
    	}
    }
}
