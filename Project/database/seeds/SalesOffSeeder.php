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
                'name' => 'KM 02-11 Quốc Khánh',
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date_modify(date_create(date('Y-m-d')), '+3 days')
            ],
            [
                'name' => 'KM 20-10 Phụ nữ Việt Nam',
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date_modify(date_create(date('Y-m-d')), '+3 days')
            ],
            [
                'name' => 'KM 20-11 Nhà Giáo Việt Nam',
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date_modify(date_create(date('Y-m-d')), '+3 days')
            ],
            [
                'name' => 'KM 14-02 Lễ tình nhân ',
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date_modify(date_create(date('Y-m-d')), '+3 days')
            ],
            [
                'name' => 'KM 1-06 Quốc tế thiếu nhi ',
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date_modify(date_create(date('Y-m-d')), '+3 days')
            ]
        ]);
        DB::table('sales_offs')->insert([
            [
                'sales_off_id' => 3,
                'percent' => 5,
                'start_date' => date('Y-m-d'),
                'end_date' => date_modify(date_create(date('Y-m-d')), '+3 days')
            ],
            [
                'sales_off_id' => 3,
                'percent' => 35,
                'start_date' => date('Y-m-d'),
                'end_date' => date_modify(date_create(date('Y-m-d')), '+3 days')
            ],
            [
                'sales_off_id' => 3,
                'percent' => 50,
                'start_date' => date('Y-m-d'),
                'end_date' => date_modify(date_create(date('Y-m-d')), '+3 days')
            ],

        ]);
    }
}
