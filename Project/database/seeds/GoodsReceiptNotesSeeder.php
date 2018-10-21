<?php

use Illuminate\Database\Seeder;

class GoodsReceiptNotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

//    public $materials = [
//        [
//            'name' => 'Thịt gà',
//            'cost' => 100000,
//            'calculation_unit_id' => 1
//        ],
//        [
//            'name' => 'Mì ý',
//            'cost' => 250000,
//            'calculation_unit_id' => 7
//        ],
//        [
//            'name' => 'Cà chua',
//            'cost' => 14000,
//            'calculation_unit_id' => 1
//        ],
//        [
//            'name' => 'Thịt bò',
//            'cost' => 110000,
//            'calculation_unit_id' => 1
//        ],
//        [
//            'name' => 'Bột mì',
//            'cost' => 23000,
//            'calculation_unit_id' => 1
//        ],
//        [
//            'name' => 'Phô mai',
//            'cost' => 200000,
//            'calculation_unit_id' => 1
//        ],
//        [
//            'name' => 'Thịt heo',
//            'cost' => 50000,
//            'calculation_unit_id' => 1
//        ],
//        [
//            'name' => 'Mì ramen',
//            'cost' => 250000,
//            'calculation_unit_id' => 7
//        ],
////        [
////            'name' => '',
////            'cost' =>
////                ],
////        [
////            'name' => '',
////            'cost' =>
////                ],
////        [
////            'name' => '',
////            'cost' =>
////                ],
//
//    ];

    public function run()
    {


        $rows = [];
        for ($i = 1; $i <= 10; $i++){
            $rows[] = $this->getRow();
        }

        $rows = array_sort($rows, function ($row) {
            return $row['date'];
        });

        DB::table('goods_receipt_notes')->insert($rows);
    }

    public function getRow(){
        $date = $this->getValidDate();
        $id = rand(1, 10);
        return [
            'date' => $date,
            'admin_id' => $id,
            'name' => \App\Admin::find($id)->name
        ];
    }

    public static function getValidDate() {
        $time = mt_rand(1388509200, 1525107600);
        $date = date('Y-m-d H:i:s', $time);
        return $date;
    }
}
