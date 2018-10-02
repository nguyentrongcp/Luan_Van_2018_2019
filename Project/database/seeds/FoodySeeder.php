<?php

use Illuminate\Database\Seeder;

class FoodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Cánh gà cay tẩm sốt 10 miếng',
                'product_created_at' => date('Y-d-m'),
                'product_updated_at' => date('Y-d-m'),
                'avatar' => 'customer/image/ga/1.png',
                'product_type_id' => 7
            ],
            [
                'name' => 'Cánh chiên nửa con tẩm sốt',
                'product_created_at' => date('Y-d-m'),
                'product_updated_at' => date('Y-d-m'),
                'avatar' => 'customer/image/ga/2.png',
                'product_type_id' => 7
            ],
            [
                'name' => 'Cánh gà cay 10 miếng',
                'product_created_at' => date('Y-d-m'),
                'product_updated_at' => date('Y-d-m'),
                'avatar' => 'customer/image/ga/3.png',
                'product_type_id' => 7
            ],
            [
                'name' => 'Gà chiên xào cay',
                'product_created_at' => date('Y-d-m'),
                'product_updated_at' => date('Y-d-m'),
                'avatar' => 'customer/image/ga/4.png',
                'product_type_id' => 7
            ],
            [
                'name' => 'Gà chiên nửa con',
                'product_created_at' => date('Y-d-m'),
                'product_updated_at' => date('Y-d-m'),
                'avatar' => 'customer/image/ga/5.png',
                'product_type_id' => 7
            ],

        ]);
    }
}
