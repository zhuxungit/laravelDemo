<?php

namespace App\Admin;

//引入框架自身已经实现的代码
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
//    use Authenticatable;
    //定义模型关联的数据表名
    protected $table = 'admin';
}
