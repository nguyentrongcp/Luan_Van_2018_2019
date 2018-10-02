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
        DB::table('product_types')->insert([
            [
                // id = 1
                'name' => 'Nước uống',
                'slug' => str_slug('Nước uống'),
                'product_type_id' => null
            ],
            [
                // id = 2
                'name' => 'Thức ăn',
                'slug' => str_slug('Thức ăn'),
                'product_type_id' => null
            ],
            [
                // id = 3
                'name' => 'Món chè',
                'slug' => str_slug('Món chè'),
                'product_type_id' => 1
            ],
            [
                // id = 4
                'name' => 'Nước ép & sinh tố',
                'slug' => str_slug('Nước ép & sinh tố'),
                'product_type_id' => 1
            ],
            [
                // id = 5
                'name' => 'Cà phê',
                'slug' => str_slug('Cà phê'),
                'product_type_id' => 1
            ],
            [
                // id = 6
                'name' => 'Trà sữa',
                'slug' => str_slug('Trà sữa'),
                'product_type_id' => 1
            ],
            [
                // id = 7
                'name' => 'Gà',
                'slug' => str_slug('Gà'),
                'product_type_id' => 2
            ],
            [
                // id = 8
                'name' => 'Các loại kem',
                'slug' => str_slug('Các loại kem'),
                'product_type_id' => 2
            ],
            [
                // id = 9
                'name' => 'Bánh ngọt',
                'slug' => str_slug('Bánh ngọt'),
                'product_type_id' => 2
            ],

        ]);
    }
}
