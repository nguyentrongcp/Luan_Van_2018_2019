<?php

use Illuminate\Database\Seeder;

class FoodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foody_types')->insert([
            [
                // id = 1
                'name' => 'Italian & Pizza',
                'slug' => str_slug('Italian & Pizza'),
            ],
            [
                // id = 2
                'name' => 'Món Nhật và Sushi',
                'slug' => str_slug('Món Nhật và Sushi'),
            ],
            [
                // id = 3
                'name' => 'Trà sữa',
                'slug' => str_slug('Trà sữa - Café'),
            ],
            [
                // id = 4
                'name' => 'Bánh mì & Xôi',
                'slug' => str_slug('Bánh mì & Xôi'),
            ],
            [
                // id = 5
                'name' => 'Món ăn vặt',
                'slug' => str_slug('Món ăn vặt'),
            ],
            [
                // id = 6
                'name' => 'Hamburger',
                'slug' => str_slug('Hamburger'),
            ],
            [
                // id = 7
                'name' => 'Bánh ngọt',
                'slug' => str_slug('Bánh ngọt'),
            ],
            [
                // id = 8
                'name' => 'Món tráng miệng',
                'slug' => str_slug('Món tráng miệng'),
            ],
            [
                // id = 9
                'name' => 'Kem',
                'slug' => str_slug('Kem'),
            ],
            [
                // id = 10
                'name' => 'Sandwich',
                'slug' => str_slug('Sandwich'),
            ],
            [
                // id = 11
                'name' => 'Sinh tố & nước ép',
                'slug' => str_slug('Sinh tố & nước ép'),
            ],
            [
                // id = 12
                'name' => 'Súp',
                'slug' => str_slug('Súp'),
            ],
            [
                // id = 13
                'name' => 'Món chay',
                'slug' => str_slug('Món chay'),
            ],
            [
                // id = 14
                'name' => 'Cơm tấm',
                'slug' => str_slug('Cơm tấm'),
            ],
            [
                // id = 15
                'name' => 'Hồng Trà & Socolat Matcha',
                'slug' => str_slug('Hồng Trà & Café'),
            ],
        ]);
    }
}
