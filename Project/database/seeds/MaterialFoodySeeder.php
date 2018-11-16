<?php

use Illuminate\Database\Seeder;

class MaterialFoodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('material_foodies')->insert([
            // id = 1
            [
                'material_id' => 4,
                'foody_id' => 2,
                'value' => 0.1
            ],
            // id = 2
            [
                'material_id' => 3,
                'foody_id' => 2,
                'value' => 0.2
            ],
            // id = 3
            [
                'material_id' => 5,
                'foody_id' => 4,
                'value' => 0.2
            ],
            // id = 4
            [
                'material_id' => 6,
                'foody_id' => 4,
                'value' => 0.1
            ],
            // id = 5
            [
                'material_id' => 7,
                'foody_id' => 14,
                'value' => 0.12
            ],
            // id = 6
            [
                'material_id' => 8,
                'foody_id' => 14,
                'value' => 2
            ],
        ]);
    }
}
