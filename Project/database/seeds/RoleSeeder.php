<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Nhân viên thu ngân', 'Nhân viên bán hàng',
            'Nhân viên kinh doanh', 'Nhân viên chăm sóc khác hàng'];
        $rows = [];
        foreach ($roles as $role) {
            $rows[] = [
                'name' => $role
            ];
        }
        DB::table('roles')->insert($rows);
    }
}
