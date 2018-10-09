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
        $rows = [];

        for ($i = 1; $i <= 5; $i++) {
            $rows[] = [
                'sales_offs_id' => random_int(1, 5),
                'foody_id' => random_int(1, 5)
            ];
        }

        DB::table('sales_offs_details')->insert($rows);
    }
}
