<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::dropIfExists('admin');
        //创建admin数据表
        Schema::create('admin',function ($table){
            //自增主键id
            $table->mediumIncrements('id');
            //用户名字段
            $table->string('username',20)->notNull();
            //密码字段
            $table->string('password')->notNull();
            //性别字段
            $table->enum('gender',[1,2,3])->notNull()->default('1');
            //手机号字段
            $table->string('mobile',11);
            //邮箱字段
            $table->string('email',40);
            //角色id
            $table->tinyInteger('role_id');
            //增加时间，修改时间字段
            $table->timestamps();
            //记住用户的登录信息字段
            $table->rememberToken();
            //用户状态字段
            $table->enum('status',[1,2])->notNull()->default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除数据表
        Schema::dropIfExists('admin');
    }
}
