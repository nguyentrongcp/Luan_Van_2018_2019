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
             CostSeeder::class,
             NewsSeeder::class,
             ShoppingCartSeeder::class,
             SalesOffSeeder::class,
             GoodsReceiptNotesSeeder::class,
             GoodsReceiptNotesDetailSeeder::class,
             GoodsReceiptNotesCostSeeder::class,
             CommentsSeeder::class,
             ShopInfosSeeder::class,
             SalesOffsDetailsSeeder::class,
<<<<<<< HEAD
             DecentralizationSeeder::class,
             DecentralizeEmployeesSeeder::class
=======
             DistrictSeeder::class,
             TransportFeeSeeder::class
>>>>>>> 7b64c6150215f9cb984e4f27235a96599d44c7ef
         ]);
    }
}
