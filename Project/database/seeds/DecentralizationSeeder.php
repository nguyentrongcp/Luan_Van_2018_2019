<?php

use Illuminate\Database\Seeder;

class DecentralizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Thống kê', 'Loại thực đơn', 'Thực đơn', 'Nhập hàng', 'Đơn hàng', 'Khuyến mãi', 'Tin tức'];
        $rows = [];
        foreach ($types as $type) {
            $rows[] = [
                'name' => $type
            ];
        }
        DB::table('decentralizations')->insert($rows);
    }
}
