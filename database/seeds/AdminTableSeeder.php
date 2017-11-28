<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //引用faker
        $faker = \Faker\Factory::create('zh_CN');
        //循环创建100条数据记录
        for ($i=0;$i<100;$i++){
            //插入数据
            DB::table('admin')->insert([
                'username'=>$faker->userName,
                'password'=>bcrypt('123456'),
                'gender'=>rand(1,3),
                'mobile'=>$faker->phoneNumber(),
                'email'=>$faker->email(40),
                'role_id'=>rand(1,5),
                'created_at'=>date('Y-m-d H:i:s'),
                'status'=>rand(1,2)
            ]);
    }
    }
}
