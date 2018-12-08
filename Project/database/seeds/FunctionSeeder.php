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
        $types = ['Thống kê', 'Loại thực đơn', 'Thực đơn', 'Nhập hàng', 'Đơn hàng', 'Khuyến mãi', 'Nội dung website','Bình luận','Phí vận chuyển'];
        $rows = [];
        foreach ($types as $type) {
            $rows[] = [
                'name' => $type
            ];
        }
        DB::table('functions')->insert($rows);
    }
}
