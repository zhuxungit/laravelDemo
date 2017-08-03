<?php

namespace App\Admin;
//引入框架自身已经实现的代码
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

//实现提示中指定需要实现的接口
class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    //定义模型关联的数据表名
    protected $table		=	'admin';

    //一对一关联role模型
    public function related_role(){
        return $this -> hasOne('App\Admin\Role', 'id', 'id');
    }
}
