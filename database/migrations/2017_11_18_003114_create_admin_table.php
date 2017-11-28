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
        //创建admin数据表
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',20)->notNull();
            $table->string('password')->notNull();
            $table->enum('gender',[1,2,3])->notNull()->default('1');
            $table->string('mobile',11);
            $table->string('email',40);
            $table->tinyInteger('role_id');
            $table->timestamps();
            $table->rememberToken();
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
        //删除admin数据表
        Schema::dropIfExists('admin');
    }
}
