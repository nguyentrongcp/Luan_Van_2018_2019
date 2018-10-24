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
        for ($i = 1; $i <= 20; $i++){
            $rows[] = [
                'content'=>'Ngon lắm nha!',
                'date'=>date('Y-m-d H:i:s'),
                'title'=>'Thúc ăn ngon lắm'.$i,
                'foody_id'=> random_int(1,5),
                'parent_id'=> null,
                'customer_id'=> random_int(1,\App\Customer::count())
            ];
        }

        DB::table('comments')->insert($rows);
    }
}
