<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;

class SalesOffsDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales_off_details')->insert([
            [
                'sales_off_id' => rand(6, 8),
                'foody_id' => 2
            ],
            [
                'sales_off_id' => rand(6, 8),
                'foody_id' => 5
            ],
            [
                'sales_off_id' => rand(6, 8),
                'foody_id' => 12
            ],
            [
                'sales_off_id' => rand(6, 8),
                'foody_id' => 32
            ],
            [
                'sales_off_id' => rand(6, 8),
                'foody_id' => 24
            ],
            [
                'sales_off_id' => rand(6, 8),
                'foody_id' => 53
            ],
            [
                'sales_off_id' => rand(6, 8),
                'foody_id' => 78
            ],
            [
                'sales_off_id' => rand(6, 8),
                'foody_id' => 21
            ],
            [
                'sales_off_id' => rand(6, 8),
                'foody_id' => 90
            ],
            [
                'sales_off_id' => rand(6, 8),
                'foody_id' => 91
            ],

        ]);
    }
}
