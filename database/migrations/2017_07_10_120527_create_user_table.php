<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user',function ($table){
            $table->mediumIncrements('id');
            $table->string('username')->unique();
            $table->string('password')->notNull();
            $table->timestamps(); //保存用户的添加数据
            $table->rememberToken();//记住用户的登录信息
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('user');
    }
}
