<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model
{
    protected $table = 'role';
    public $timestamps = false;

    //实现角色权限的分派
    public function saveUpdate($id,$auth_ids){
    	//将ids数组转化成字符串
    	$data['auth_ids'] = implode(',',$auth_ids);
    	//$data['auth_ids'] = implode($auth_ids,',');	这参数顺序也是可以的
    	//查询数据表auth获取ac字符串
    	$str = '';
    	$ac = DB::table('auth') -> select('controller','action') -> where('pid','>','0') -> whereIn('id',$auth_ids) -> get();
    	//拼接字符串
    	foreach ($ac as $key => $value) {
    		$str .= $value -> controller . '@' . $value -> action . ',';
    	}
    	//去除多余逗号
    	$data['auth_ac'] = rtrim($str,',');
    	//执行更新操作
    	return DB::table('role') -> where('id',$id) -> update($data);
    }

}
