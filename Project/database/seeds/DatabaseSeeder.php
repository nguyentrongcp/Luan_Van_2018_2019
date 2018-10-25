<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             AdminSeeder::class,
             CustomerSeeder::class,
             FoodyTypeSeeder::class,
             FoodySeeder::class,
             FoodyStatusSeeder::class,
             CostSeeder::class,
             NewsSeeder::class,
             ShoppingCartSeeder::class,
             SalesOffSeeder::class,
//             GoodsReceiptNotesSeeder::class,
//             GoodsReceiptNotesDetailSeeder::class,
//             GoodsReceiptNotesCostSeeder::class,
             CommentsSeeder::class,
             ShopInfosSeeder::class,
             SalesOffsDetailsSeeder::class,
             DecentralizationSeeder::class,
             DecentralizeEmployeesSeeder::class,
             DistrictSeeder::class,
             TransportFeeSeeder::class,
             OrdersSeeder::class,
             OrderFoodiesSeeder::class,
             CalculationUnitSeeder::class,
             MaterialSeeder::class,
             MaterialFoodySeeder::class,
             LikeSeeder::class,
             VoteDetailSeeder::class,
             VoteSeeder::class,
         ]);
    }
}
