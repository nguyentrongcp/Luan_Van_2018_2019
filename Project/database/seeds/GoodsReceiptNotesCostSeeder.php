<?php

use Illuminate\Database\Seeder;

class GoodsReceiptNotesCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        $total = \App\GoodsReceiptNote::count();
        for ($i = 1; $i <= $total; $i++){
            $cost = App\GoodsReceiptNoteDetail::where('goods_receipt_note_id',$i)->sum('total_cost');
            $rows[] = [
                'cost'=>$cost,
                'goods_receipt_note_id' => $i
            ];
        }
        DB::table('goods_receipt_note_costs')->insert($rows);
    }



}
