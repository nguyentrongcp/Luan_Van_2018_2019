<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculationUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calculation_units')->insert([
            // 1
            [
                'name' => 'Kilôgam',
                'unit' => 'kg'
            ],
            // 2
            [
                'name' => 'Gam',
                'unit' => 'g'
            ],
            // 3
            [
                'name' => 'Chai',
                'unit' => 'c'
            ],
            // 4
            [
                'name' => 'Lít',
                'unit' => 'l'
            ],
            // 5
            [
                'name' => 'Con',
                'unit' => 'con'
            ],
            // 6
            [
                'name' => 'Gói',
                'unit' => 'gói'
            ],
            // 7
            [
                'name' => 'Thùng',
                'unit' => 'thùng'
            ],
        ]);
    }
}
