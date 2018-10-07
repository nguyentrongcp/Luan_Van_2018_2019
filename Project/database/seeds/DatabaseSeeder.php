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
<<<<<<< Updated upstream
             SalesOffSeeder::class,
             GoodsReceiptNotesSeeder::class,
             GoodsReceiptNotesDetailSeeder::class,
             GoodsReceiptNotesCostSeeder::class

=======
             SalesOffSeeder::class
>>>>>>> Stashed changes
         ]);
    }
}
