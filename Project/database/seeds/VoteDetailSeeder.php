<?php

use Illuminate\Database\Seeder;

class VoteDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        for($i=2; $i<=\App\Foody::count(); $i++) {
            for($j=3; $j<rand(10,\App\Customer::count()); $j++) {
                $rows[] = [
                    'cost' => rand(1, 5),
                    'quality' => rand(1, 5),
                    'attitude' => rand(1, 5),
                    'foody_id' => $i,
                    'customer_id' => $j
                ];
            }
        }

        DB::table('vote_details')->insert($rows);
    }
}
