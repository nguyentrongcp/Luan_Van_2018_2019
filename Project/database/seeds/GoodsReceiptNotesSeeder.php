<?php

use Illuminate\Database\Seeder;

class GoodsReceiptNotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $row_details = [];
        $total_cost = 0;
        do {
            $materials = [
                [
                    'name' => 'Thịt gà',
                    'cost' => rand(130,150),
                    'id' => 1,
                    'qty' => rand(5,10)
                ],
                [
                    'name' => 'Mì Ý Panzani Gói 400g',
                    'cost' => rand(35,45),
                    'id' => 6,
                    'qty' => rand(10,15)
                ],
                [
                    'name' => 'Cà chua',
                    'cost' => rand(10,19),
                    'id' => 1,
                    'qty' => rand(5,10)
                ],
                [
                    'name' => 'Thịt bò',
                    'cost' => rand(200,230),
                    'id' => 1,
                    'qty' => rand(5,10)
                ],
                [
                    'name' => 'Bột Mì Meizan Gói 1kg',
                    'cost' => rand(40,50),
                    'id' => 6,
                    'qty' => rand(3, 6)
                ],
                [
                    'name' => 'Phô mai Mozzarella hiệu Grand’Or – gói 200gr',
                    'cost' => rand(90,100),
                    'id' => 6,
                    'qty' => rand(10,20)
                ],
                [
                    'name' => 'Thịt heo',
                    'cost' => rand(50,80),
                    'id' => 1,
                    'qty' => rand(5,10)
                ],
                [
                    'name' => 'MÌ RAMEN ĂN LIỀN MAMA 420G (14 GÓI X 30G)',
                    'cost' => rand(100,120),
                    'id' => 7,
                    'qty' => rand(2,4)
                ],
            ];
            DB::table('goods_receipt_notes')->insert($this->getRow());
            $cost = 0;
            foreach($materials as $key => $material) {
                $cost += $material['cost'] * 1000 * $material['qty'];
                $total_cost += $material['cost'] * 1000 * $material['qty'];
                $row_details[] = [
                    'unit_id' => $material['id'],
                    'material' => $material['name'],
                    'quantity' => $material['qty'],
                    'cost' => $material['cost'] * 1000,
                    'total_cost'=> $material['cost'] * 1000 * $material['qty'],
                    'goods_receipt_note_id' => \App\GoodsReceiptNote::max('id')
                ];
            }
            DB::table('goods_receipt_note_costs')->insert([
                [
                    'goods_receipt_note_id' => \App\GoodsReceiptNote::max('id'),
                    'cost' => $cost
                ]
            ]);
        }
        while ($total_cost < \App\Order::sum('total_of_cost') / 2);
        DB::table('goods_receipt_note_details')->insert($row_details);

//        $rows = array_sort($rows, function ($row) {
//            return $row['date'];
//        });
//
//        DB::table('goods_receipt_notes')->insert($rows);
    }

    public function getRow(){
        $date = $this->getValidDate();
        $id = rand(1, \App\Admin::count());
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
