<?php

use Illuminate\Database\Seeder;

class TransportFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transport_fees')->insert([
            [
                'ward' => 'An Thới',
                'district_id' => 1,
                'cost' => 20000
            ],
            [
                'ward' => 'Bình Thủy',
                'district_id' => 1,
                'cost' => 25000
            ],
            [
                'ward' => 'Bùi Hữu Nghĩa',
                'district_id' => 1,
                'cost' => 20000
            ],
            [
                'ward' => 'Long Hòa',
                'district_id' => 1,
                'cost' => 30000
            ],
            [
                'ward' => 'Long Tuyền',
                'district_id' => 1,
                'cost' => 40000
            ],
            [
                'ward' => 'Thới An Đông',
                'district_id' => 1,
                'cost' => 40000
            ],
            [
                'ward' => 'Trà An',
                'district_id' => 1,
                'cost' => 35000
            ],
            [
                'ward' => 'Trà Nóc',
                'district_id' => 1,
                'cost' => 45000
            ],
            [
                'ward' => 'Ba Láng',
                'district_id' => 2,
                'cost' => 20000
            ],
            [
                'ward' => 'Hưng Phú',
                'district_id' => 2,
                'cost' => 15000
            ],
            [
                'ward' => 'Hưng Thạnh',
                'district_id' => 2,
                'cost' => 20000
            ],
            [
                'ward' => 'Lê Bình',
                'district_id' => 2,
                'cost' => 25000
            ],
            [
                'ward' => 'Phú Thứ',
                'district_id' => 2,
                'cost' => 30000
            ],
            [
                'ward' => 'Tân Phú',
                'district_id' => 2,
                'cost' => 15000
            ],
            [
                'ward' => 'Thường Thạnh',
                'district_id' => 2,
                'cost' => 10000
            ],
            [
                'ward' => 'An Bình',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'An Cư',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'An Hòa',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'An Hội',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'An Khánh',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'An Lạc',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'An Nghiệp',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'An Phú',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'Cái Khế',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'Hưng Lợi',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'Tân An',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'Thới Bình',
                'district_id' => 3,
                'cost' => 20000
            ],
            [
                'ward' => 'Xuân Khánh',
                'district_id' => 3,
                'cost' => 0
            ],
            [
                'ward' => 'Châu Văn Liêm',
                'district_id' => 4,
                'cost' => 30000
            ],
            [
                'ward' => 'Long Hưng',
                'district_id' => 4,
                'cost' => 25000
            ],
            [
                'ward' => 'Phước Thới',
                'district_id' => 4,
                'cost' => 30000
            ],
            [
                'ward' => 'Thới An',
                'district_id' => 4,
                'cost' => 25000
            ],
            [
                'ward' => 'Thới Hòa',
                'district_id' => 4,
                'cost' => 30000
            ],
            [
                'ward' => 'Thới Long',
                'district_id' => 4,
                'cost' => 35000
            ],
            [
                'ward' => 'Trường Lạc',
                'district_id' => 4,
                'cost' => 40000
            ],
            [
                'ward' => 'Tân Hưng',
                'district_id' => 5,
                'cost' => 50000
            ],
            [
                'ward' => 'Tân Lộc',
                'district_id' => 5,
                'cost' => 50000
            ],
            [
                'ward' => 'Thạnh Hòa',
                'district_id' => 5,
                'cost' => 45000
            ],
            [
                'ward' => 'Thới Thuận',
                'district_id' => 5,
                'cost' => 40000
            ],
            [
                'ward' => 'Thốt Nốt',
                'district_id' => 5,
                'cost' => 35000
            ],
            [
                'ward' => 'Thuận An',
                'district_id' => 5,
                'cost' => 35000
            ],
            [
                'ward' => 'Thuận Hưng',
                'district_id' => 5,
                'cost' => 35000
            ],
            [
                'ward' => 'Trung Kiên',
                'district_id' => 5,
                'cost' => 30000
            ],
            [
                'ward' => 'Trung Nhất',
                'district_id' => 5,
                'cost' => 45000
            ],

        ]);
    }
}
