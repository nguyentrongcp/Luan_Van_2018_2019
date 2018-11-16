<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Nguyễn Nguyễn',
                'email' => 'nguyennguyencp@gmail.com',
                'password' => bcrypt('635982359'),
                'phone' => '01628446973',
                'address' => 'Trên mặt đất / kế nhà tui',
                'gender' => 'male',
                'avatar' => asset('customer/image/my_avatar.jpg')
            ],
            [
                'name' => 'Lý Trường Giang',
                'email' => 'ltgiang@gmail.com',
                'password' => bcrypt('1'),
                'phone' => '01628446973',
                'address' => 'Trên mặt đất / kế nhà tui',
                'gender' => 'female',
                'avatar' => asset('customer/image/default.png')
            ]
        ]);

        $data = json_decode(Info::INFO, true);
        $ran = ['03', '05', '07', '09'];
        $rows = [];
        for($i=1; $i<399; $i++) {
            $phone = $ran[$i%4] + rand(10000000, 99999999);
            $row = [
                'name' => $data[$i]['name'],
                'email' => $data[$i]['email'],
                'password' => bcrypt('635982359'),
                'phone' => $phone,
                'address' => $data[$i]['address'],
                'gender' => rand(1,2)==1 ? 'male' : 'female',
                'avatar' => asset('customer/image/default.png')
            ];
            array_push($rows, $row);
        }

        DB::table('customers')->insert($rows);
    }
}
