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
        $id = random_int(1, 10);
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
