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
                'sales_off_id' => random_int(1, 5),
                'foody_id' => random_int(1, App\Foody::count())
            ];
        }

        DB::table('sales_off_details')->insert($rows);
    }
}
