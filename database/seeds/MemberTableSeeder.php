<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //模拟测试数据
        $faker = \Faker\Factory::create('zh_CN');

        for($i=0;$i<100;$i++){
            DB::table('member')->insert([
                'username'=>$faker->userName,
                'password'=>bcrypt('123456'),
                'gender'  =>rand(1,3),
                'mobile'  =>$faker->phoneNumber,
                'email'   =>$faker->email,
                'avatar'  =>'/avatar.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'type'    =>rand(1,2),
                'status'  =>rand(1,2),
            ]);
        }
    }
}
