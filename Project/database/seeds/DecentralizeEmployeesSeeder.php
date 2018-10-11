<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DecentralizeEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $rows = [];
        for ($i = 1; $i <= 7; $i++) {
            $rows[] = [
                'admin_id' => random_int(1, 10),
                'decentralization_id' => random_int(1, 7)
            ];
        }
        DB::table('decentralize_employees')->insert($rows);
    }

}
