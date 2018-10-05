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
        $rows = [];

        foreach(\App\Foody::all() as $foody) {
            $cost = rand(20, 200) * 1000;
            $rows[] = ['cost' => "$cost", 'cost_updated_at' => date('Y-m-d H:i:s'),
                'foody_id' => $foody->id];
        }
        DB::table('costs')->insert($rows);
    }
}
