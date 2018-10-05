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
        DB::table('foodies')->insert([
            [
                'name' => 'Cánh gà cay tẩm sốt 10 miếng',
                'foody_created_at' => date('Y-d-m'),
                'foody_updated_at' => date('Y-d-m'),
                'avatar' => 'customer/image/ga/1.png',
                'foody_type_id' => 7,
                'slug' => str_slug('Cánh gà cay tẩm sốt 10 miếng')
            ],
            [
                'name' => 'Cánh chiên nửa con tẩm sốt',
                'foody_created_at' => date('Y-d-m'),
                'foody_updated_at' => date('Y-d-m'),
                'avatar' => '/customer/image/ga/2.png',
                'foody_type_id' => 7,
                'slug' => str_slug('Cánh chiên nửa con tẩm sốt')
            ],
            [
                'name' => 'Cánh gà cay 10 miếng',
                'foody_created_at' => date('Y-d-m'),
                'foody_updated_at' => date('Y-d-m'),
                'avatar' => '/customer/image/ga/3.png',
                'foody_type_id' => 7,
                'slug' => str_slug('Cánh gà cay 10 miếng')
            ],
            [
                'name' => 'Gà chiên xào cay',
                'foody_created_at' => date('Y-d-m'),
                'foody_updated_at' => date('Y-d-m'),
                'avatar' => '/customer/image/ga/4.png',
                'foody_type_id' => 7,
                'slug' => str_slug('Gà chiên xào cay')
            ],
            [
                'name' => 'Gà chiên nửa con',
                'foody_created_at' => date('Y-d-m'),
                'foody_updated_at' => date('Y-d-m'),
                'avatar' => '/customer/image/ga/5.png',
                'foody_type_id' => 7,
                'slug' => str_slug('Gà chiên nửa con')
            ],

        ]);
    }
}
