<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoodsReceiptNotesDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $rows = [];
        $materials = ['Bột mì', 'Đường', 'Bột gạo', 'Thịt gà', 'Khoai tây', 'Bánh mì', 'Sũa tươi', 'Nước ngọt', 'Dầu ăn', 'Rau sạch'];
        for ($i = 1; $i <= 50; $i++) {
                $value = random_int(5, 10);
                $cost = random_int(10000, 100000);
                $material = array_random($materials);
                $rows[] = [
                    'material' => $material,
                    'value' => $value.' '.'kg',
                    'cost' => $cost,
                    'goods_receipt_note_id' => random_int(1, 10)
                ];
        }

        DB::table('goods_receipt_note_details')->insert($rows);
    }

}
