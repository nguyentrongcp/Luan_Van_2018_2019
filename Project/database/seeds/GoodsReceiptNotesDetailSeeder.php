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
        for ($i = 1; $i <= 150; $i++) {
                $value = random_int(5, 10);
                $cost = random_int(10000, 100000);
                $material_id = random_int(1,\App\Material::count());
                $rows[] = [
                    'material_id'=>$material_id,
                    'material' => \App\Material::find($material_id)->name,
                    'value' => $value.' '.'kg',
                    'cost' => $cost,
                    'total_cost'=> $cost*$value,
                    'goods_receipt_note_id' => random_int(1, \App\GoodsReceiptNote::count())
                ];
        }

        DB::table('goods_receipt_note_details')->insert($rows);
    }

}
