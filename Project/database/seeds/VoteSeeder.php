<?php

use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
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
            $foody = \App\Foody::find($i);
            $cost = $foody->voteDetails()->avg('cost');
            $quanlity = $foody->voteDetails()->avg('quality');
            $attitude = $foody->voteDetails()->avg('attitude');
            $rows[] = [
                'cost' => number_format($cost, 1),
                'quality' => number_format($quanlity, 1),
                'attitude' => number_format($attitude, 1),
                'average' => number_format(($cost + $quanlity + $attitude) / 3, 1),
                'foody_id' => $i
            ];
        }
        DB::table('votes')->insert($rows);
    }
}
