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
                'username' => 'nguyennguyencp',
                'password' => bcrypt('635982359'),
                'phone' => '01628446973',
                'address' => 'Trên mặt đất / kế nhà tui',
                'subscribed' => true
            ],
            [
                'name' => 'Lý Trường Giang',
                'email' => 'ltgiang@gmail.com',
                'username' => 'ltgiang',
                'password' => bcrypt('1'),
                'phone' => '01628446973',
                'address' => 'Trên mặt đất / kế nhà tui',
                'subscribed' => true
            ]
        ]);

        $data = json_decode(Info::INFO, true);
        $ran = ['03', '05', '07', '09'];
        $rows = [];
        for($i=1; $i<399; $i++) {
            $phone = $ran[$i%4] + rand(10000000, 99999999);
            $username = substr($data[$i]['email'], 0, strpos($data[$i]['email'], '@'));
            if (strlen($username) > 16) {
                $username = substr($username, 0, 15);
            }
            $row = [
                'name' => $data[$i]['name'],
                'email' => $data[$i]['email'],
                'username' => $username,
                'password' => bcrypt('635982359'),
                'phone' => $phone,
                'address' => $data[$i]['address'],
                'subscribed' => true
            ];
            array_push($rows, $row);
        }

        DB::table('customers')->insert($rows);
    }
}
