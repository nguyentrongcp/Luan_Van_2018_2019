<?php

use Illuminate\Database\Seeder;

class FunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Thống kê', 'Loại món', 'Món ăn', 'Nguyên liệu','Nhập hàng', 'Đơn hàng', 'Khuyến mãi', 'Nội dung website','Phí vận chuyển'];
        $rows = [];
        foreach ($types as $type) {
            $rows[] = [
                'name' => $type
            ];
        }
        DB::table('functions')->insert($rows);
    }
}
