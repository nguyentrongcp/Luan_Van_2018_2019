<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            [
                'district' => 'Bình Thủy' // 1
            ],
            [
                'district' => 'Cái Răng' // 2
            ],
            [
                'district' => 'Ninh Kiều' // 3
            ],
            [
                'district' => 'Ô Môn' // 4
            ],
            [
                'district' => 'Thốt Nốt' // 5
            ],
//            [
//                'district' => 'Cờ Đỏ' // 6
//            ],
//            [
//                'district' => 'Phong Điền' // 7
//            ],
//            [
//                'district' => 'Thới Lai' // 8
//            ],
//            [
//                'district' => 'Vĩnh Thạnh' // 9
//            ],

        ]);
    }
}
