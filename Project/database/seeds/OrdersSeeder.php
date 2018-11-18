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
        for ($i = 1; $i <= 600; $i++) {
            $rows = [];
            $foodies = [];
            $total_of_cost = 0;
            for ($j = 1; $j <= rand(2, 10); $j++) {
                $foody_id = $this->getFoody($foodies);
                $foodies[] = $foody_id;
                $amount = rand(1, 10);
                $foody = \App\Foody::find($foody_id);
                $total_of_cost += $amount * $foody->getSaleCost();
                $rows[] = [
                    'order_id'=> $i,
                    'foody_id'=> $foody_id,
                    'amount'=> $amount,
                    'cost' => $foody->getSaleCost(),
                    'sales_off_percent' => 0,
                    'total_of_cost' => $amount * $foody->getSaleCost(),
                ];
            }
            DB::table('orders')->insert($this->getRow($i, $data, $total_of_cost));
//            $date = date_modify(date_create(date('Y-m-d')), '-3 days')->getTimestamp();
            $date = date_create('2018-01-01')->getTimestamp();
            DB::table('order_statuses')->insert([
                [
                    'order_id' => $i,
                    'status' => date_create(\App\Order::find($i)->order_created_at)->getTimestamp() >= $date ? rand(0,1) : 2,
                    'admin_id' => rand(1, \App\Admin::count())
                ]
            ]);
            DB::table('order_foodies')->insert($rows);
        }


//        $rows = array_sort($rows, function ($row) {
//            return $row['order_created_at'];
//        });
    }

    public function getFoody($foodies) {
        do {
            $foody_id = rand(1, \App\Foody::count());
        }
        while(array_search($foody_id, $foodies) !== false);

        return $foody_id;
    }

    public function getRow($i, $data, $total_of_cost)
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
            'total_of_cost' => $total_of_cost,
            'transport_fee' => 0,
        ];
    }

    public static function getValidDate()
    {
        $time = mt_rand(1388509200, date_create(date('Y-m-d'))->getTimestamp());
        $date = date('Y-m-d H:i:s', $time);
        return $date;
    }
}
