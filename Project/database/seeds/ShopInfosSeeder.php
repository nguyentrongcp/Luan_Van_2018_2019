<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;
class ShopInfosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_infos')->insert([
            'name'=>'Fast Foody Shop',
            'logo'=>'admin/assets/images/logo.png',
            'address'=>'Ninh Kiều - Cần Thơ',
            'phone'=> '0123456789',
            'email'=>'fastfoodyshop@gmail.com'
        ]);
    }
}
