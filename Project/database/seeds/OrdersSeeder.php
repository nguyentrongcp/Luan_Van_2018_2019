<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(Info::INFO, true);
        $rows = [];
        for ($i = 0; $i < 299; $i++)
            $rows[] = $this->getRow($i, $data);

        $rows = array_sort($rows, function ($row) {
            return $row['order_created_at'];
        });

        DB::table('orders')->insert($rows);
    }

    public function getRow($i, $data)
    {
        $receiver = $data[$i];
        $date = self::getValidDate();
        return [
            'order_code' => strtoupper(str_random(12)),
            'receiver' => $receiver['name'],
            'to' => $receiver['address'],
            'customer_id' => random_int(1, App\Customer::count()),
            'email' => strtolower($receiver['email']),
            'phone' => preg_replace('/(\s|\(|\))/i', '', $receiver['phone']),
            'address' => $receiver['address'],
            'order_created_at' => $date,
            'payment_type' => rand(1, 2),
            'total_of_cost' => random_int(20000, 1000000),
            'transport_fee' => 10,
        ];
    }

    public static function getValidDate()
    {
        $time = mt_rand(1388509200, 1525107600);
        $date = date('Y-m-d H:i:s', $time);
        return $date;
    }
}
