<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member',function ($table){
            $table->Increments('id');//主键id
            $table->string('username',20)->notNull();//用户名
            $table->string('password',255)->notNull();//密码
            $table->enum('gender',[1,2,3])->notNull()->default(1);//性别1男2女3保密
            $table->char('mobile',11);//手机号
            $table->string('email',40);//电子邮箱
            $table->string('avatar',255);//头像地址
            $table->enum('type',[1,2])->notNull()->default(1);//账号类型，1学生2老师
            $table->enum('status',[1,2])->notNull()->default(2);//账号类型，1禁用2启用
            $table->timestamps();//创建时间和更新时间
            $table->rememberToken();//记住我
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
