<?php

use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            // id = 1
            [
                'name' => 'Thịt gà',
                'value' => 30,
                'calculation_unit_id' => 1
            ],
            // id = 2
            [
                'name' => 'Mì ý',
                'value' => 100,
                'calculation_unit_id' => 6
            ],
            // id = 3
            [
                'name' => 'Cà chua',
                'value' => 15,
                'calculation_unit_id' => 1
            ],
            // id = 4
            [
                'name' => 'Thịt bò',
                'value' => 10,
                'calculation_unit_id' => 1
            ],
            // id = 5
            [
                'name' => 'Bột mì',
                'value' => 15,
                'calculation_unit_id' => 1
            ],
            // id = 6
            [
                'name' => 'Phô mai',
                'value' => 10,
                'calculation_unit_id' => 1
            ],
            // id = 7
            [
                'name' => 'Thịt heo',
                'value' => 10,
                'calculation_unit_id' => 1
            ],
            // id = 8
            [
                'name' => 'Mì ramen',
                'value' => 113,
                'calculation_unit_id' => 6
            ],
        ]);
    }
}
