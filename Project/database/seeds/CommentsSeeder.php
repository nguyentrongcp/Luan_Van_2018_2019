<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        for ($i = 1; $i <= 10; $i++){
            $rows[] = [
                'title'=>'Thúc ăn ngon lắm'.$i,
                'content'=>'Ngon lắm nha!',
                'date'=>date('Y-m-d H-i-s'),
                'foody_id'=> random_int(1,5),
                'customer_id'=> 1
            ];
        }

        DB::table('comments')->insert($rows);
    }
}
