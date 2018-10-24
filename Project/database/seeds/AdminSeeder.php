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
                'name' => 'Mr. Blo bla',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'blabla@gmail.com',
                'phone' => '01639883047',
                'username' => 'blabla',
                'password' => bcrypt('111111'),
                'role_id' => 1
            ],
            [
                'name' => 'Nguyễn Đình Trọng',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'nguyentrongcp@gmail.com',
                'phone' => '01639883047',
                'username' => 'nguyentrong',
                'password' => bcrypt('111111'),
                'role_id' => 1
            ],
            [
                'name' => 'Lý Trường Giang',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'ltgiang@gmail.com',
                'phone' => '01639883047',
                'username' => 'ltgiang',
                'password' => bcrypt('111111'),
                'role_id' => 1
            ],
            [
                'name' => 'Nguyễn Văn Lộc',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'nvloc@gmail.com',
                'phone' => '01639883047',
                'username' => 'nvloc',
                'password' => bcrypt('111111'),
                'role_id' => 2
            ],
            [
                'name' => 'Phạm Hoài An',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'phoaian@gmail.com',
                'phone' => '01639883047',
                'username' => 'phoaian',
                'password' => bcrypt('111111'),
                'role_id' => 3
            ],
            [
                'name' => 'Phan Văn Thành',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'pvthanh@gmail.com',
                'phone' => '01639883047',
                'username' => 'pvthanh',
                'password' => bcrypt('111111'),
                'role_id' => 4
            ],
            [
                'name' => 'Nguyễn Văn Tài',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'nvantai@gmail.com',
                'phone' => '01639883047',
                'username' => 'nvantai',
                'password' => bcrypt('111111'),
                'role_id' => 5
            ],
            [
                'name' => 'La Thị Kiều Oanh',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'ltkoanh@gmail.com',
                'phone' => '01639883047',
                'username' => 'ltkoanh',
                'password' => bcrypt('111111'),
                'role_id' => 3
            ],
            [
                'name' => 'Phan Thị Kiều Loan',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'ptkloan@gmail.com',
                'phone' => '01639883047',
                'username' => 'ptkloan',
                'password' => bcrypt('111111'),
                'role_id' => 3
            ],
            [
                'name' => 'Đỗ Việt Hùng',
                'address'=>'Ninh Kiều - Cần Thơ',
                'email' => 'dvhung@gmail.com',
                'phone' => '01639883047',
                'username' => 'dvhung',
                'password' => bcrypt('111111'),
                'role_id' => 3
            ]
        ]);
    }
}
