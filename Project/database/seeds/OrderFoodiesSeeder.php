<?php

use Illuminate\Database\Seeder;

class OrderFoodiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalOrder = DB::table('orders')->count();
        for ($i = 1; $i <= $totalOrder; $i++) {
            $totalFoodies = random_int(1, 3);
            for ($j = 1; $j <= $totalFoodies; $j++){
                $foody_id = random_int(1,App\Foody::count());
                $amount = random_int(1,5);
                $cost = App\Foody::find($foody_id)->currentCost();
                DB::table('order_foodies')->insert([
                   'order_id'=> $i,
                    'foody_id'=> $foody_id,
                    'amount'=> $amount,
                    'cost' => $cost,
                    'sales_off_percent' => 0,
                    'total_of_cost' => $amount*$cost,
                ]);
            }
            DB::table('order_statuses')->insert([
               'order_id'=>$i,
                'status'=> random_int(0,3),
                'admin_id'=>random_int(1,App\Admin::count()),
                'approved_date'=>date('Y-m-d H:i:s')
            ]);
        }
    }


}
