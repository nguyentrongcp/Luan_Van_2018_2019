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
                'name' => 'Nước uống',
                'slug' => str_slug('Nước uống'),
                'foody_type_id' => null
            ],
            [
                // id = 2
                'name' => 'Thức ăn',
                'slug' => str_slug('Thức ăn'),
                'foody_type_id' => null
            ],
            [
                // id = 3
                'name' => 'Món chè',
                'slug' => str_slug('Món chè'),
                'foody_type_id' => 1
            ],
            [
                // id = 4
                'name' => 'Nước ép & sinh tố',
                'slug' => str_slug('Nước ép & sinh tố'),
                'foody_type_id' => 1
            ],
            [
                // id = 5
                'name' => 'Cà phê',
                'slug' => str_slug('Cà phê'),
                'foody_type_id' => 1
            ],
            [
                // id = 6
                'name' => 'Trà sữa',
                'slug' => str_slug('Trà sữa'),
                'foody_type_id' => 1
            ],
            [
                // id = 7
                'name' => 'Gà',
                'slug' => str_slug('Gà'),
                'foody_type_id' => 2
            ],
            [
                // id = 8
                'name' => 'Các loại kem',
                'slug' => str_slug('Các loại kem'),
                'foody_type_id' => 2
            ],
            [
                // id = 9
                'name' => 'Bánh ngọt',
                'slug' => str_slug('Bánh ngọt'),
                'foody_type_id' => 2
            ],

        ]);
    }
}
