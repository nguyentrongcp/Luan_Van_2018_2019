<?php

use Illuminate\Database\Seeder;

class FoodyStatusSeeder extends Seeder
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
            $rows[] = ['foody_id' => $foody->id];
        }
        DB::table('foody_statuses')->insert($rows);
    }
}
