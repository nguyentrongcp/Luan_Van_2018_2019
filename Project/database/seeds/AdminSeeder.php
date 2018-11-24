<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([

            [
                'name' => 'Nguyễn Đình Trọng',
                'avatar'=>'admin/assets/img/mike.jpg',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'nguyentrongcp@gmail.com',
                'phone' => '0331542678',
                'username' => 'nguyentrong',
                'password' => bcrypt('111111'),
                'role_id' => 1
            ],
            [
                'name' => 'Lý Trường Giang',
                'avatar'=>'admin/assets/img/mike.jpg',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'ltgiang@gmail.com',
                'phone' => '0962987036',
                'username' => 'ltgiang',
                'password' => bcrypt('111111'),
                'role_id' => 1
            ],
            [
                'name' => 'Nguyễn Văn Lộc',
                'avatar'=>'admin/assets/img/mike.jpg',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'nvloc@gmail.com',
                'phone' => '0381245564',
                'username' => 'nvloc',
                'password' => bcrypt('111111'),
                'role_id' => 2
            ],
            [
                'name' => 'Phạm Hoài An',
                'avatar'=>'admin/assets/img/mike.jpg',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'phoaian@gmail.com',
                'phone' => '0665584568',
                'username' => 'phoaian',
                'password' => bcrypt('111111'),
                'role_id' => 3
            ],
            [
                'name' => 'Phan Văn Thành',
                'avatar'=>'admin/assets/img/mike.jpg',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'pvthanh@gmail.com',
                'phone' => '0839883047',
                'username' => 'pvthanh',
                'password' => bcrypt('111111'),
                'role_id' => 4
            ],
            [
                'name' => 'Nguyễn Văn Tài',
                'avatar'=>'admin/assets/img/mike.jpg',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'nvantai@gmail.com',
                'phone' => '0375846788',
                'username' => 'nvantai',
                'password' => bcrypt('111111'),
                'role_id' => 5
            ],
            [
                'name' => 'La Thị Kiều Oanh',
                'avatar'=>'admin/assets/img/mike.jpg',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'ltkoanh@gmail.com',
                'phone' => '0709587451',
                'username' => 'ltkoanh',
                'password' => bcrypt('111111'),
                'role_id' => 3
            ],
            [
                'name' => 'Phan Thị Kiều Loan',
                'avatar'=>'admin/assets/img/mike.jpg',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'ptkloan@gmail.com',
                'phone' => '0325588987',
                'username' => 'ptkloan',
                'password' => bcrypt('111111'),
                'role_id' => 3
            ],
            [
                'name' => 'Đỗ Việt Hùng',
                'avatar'=>'admin/assets/img/mike.jpg',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'dvhung@gmail.com',
                'phone' => '0354412154',
                'username' => 'dvhung',
                'password' => bcrypt('111111'),
                'role_id' => 3
            ]
        ]);
    }
}
