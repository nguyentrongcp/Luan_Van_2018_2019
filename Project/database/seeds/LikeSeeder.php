<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        for($i=1; $i<\App\Foody::count(); $i++) {
            for($j=3; $j<rand(10,\App\Customer::count()); $j++) {
                $row = [
                    'customer_id' => $j,
                    'foody_id' => $i
                ];
                array_push($rows,$row);
            }
        }
        DB::table('likes')->insert($rows);
    }
}
