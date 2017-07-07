<?php

use Illuminate\Database\Seeder;

class brandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('brand')->insert([
            'brand_name'=>'华为',
            'site_url'=>'http://www.huawei.com',
            'description'=>'中国制造',
            'created_at'=>date('Y-m-d H:i:s',time()),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);


        DB::table('brand')->insert([
            'brand_name'=>'小米',
            'site_url'=>'http://www.xiaomi.com',
            'description'=>'中国制造',
            'created_at'=>date('Y-m-d H:i:s',time()),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
