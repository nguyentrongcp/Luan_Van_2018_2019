<?php

use Illuminate\Database\Seeder;

class VoteDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        for ($i = 1; $i <= 100; $i++){
            $rows[] =[
                'cost'=> random_int(1,5),
                'quality'=>random_int(1,5),
                'attitude'=>random_int(1,5),
                'foody_id'=>random_int(1,App\Foody::count()),
                'customer_id'=>random_int(1,App\Customer::count())
            ];
        }
        DB::table('vote_details')->insert($rows);
    }
}
