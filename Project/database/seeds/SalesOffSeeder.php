<?php

use Illuminate\Database\Seeder;

class SalesOffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales_offs')->insert([
            [
                'name' => 'KM 02-09 Quốc Khánh',
                'percent' => '10',
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'KM 20-10 Phụ nữ Việt Nam',
                'percent' => '15',
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'KM 20-11 Nhà Giáo Việt Nam',
                'percent' => '10',
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'KM 14-02 Lễ tình nhân ',
                'percent' => '20',
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
