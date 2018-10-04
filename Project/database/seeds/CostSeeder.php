<?php

use Illuminate\Database\Seeder;

class CostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('costs')->insert([
            [
                'cost' => '12000',
                'cost_updated_at' => date('Y-m-d H:i:s'),
                'foody_id' => 1
            ],
            [
                'cost' => '14000',
                'cost_updated_at' => date('Y-m-d H:i:s'),
                'foody_id' => 2
            ],
            [
                'cost' => '16000',
                'cost_updated_at' => date('Y-m-d H:i:s'),
                'foody_id' => 3
            ],
            [
                'cost' => '18000',
                'cost_updated_at' => date('Y-m-d H:i:s'),
                'foody_id' => 4
            ],
            [
                'cost' => '11000',
                'cost_updated_at' => date('Y-m-d H:i:s'),
                'foody_id' => 5
            ]
        ]);
    }
}
