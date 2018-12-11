<?php

use Illuminate\Database\Seeder;

class EmployeeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('employee_roles')->insert([
            [
                'role_id' => 2,
                'function_id' => 5
            ],
            [
                'role_id' => 2,
                'function_id' => 6
            ],
            [
                'role_id' => 3,
                'function_id' => 2
            ],
            [
                'role_id' => 3,
                'function_id' => 3
            ],
            [
                'role_id' => 3,
                'function_id' => 4
            ],
            [
                'role_id' => 3,
                'function_id' => 5
            ],
            [
                'role_id' => 3,
                'function_id' => 6
            ],
            [
                'role_id' => 4,
                'function_id' => 2
            ],
            [
                'role_id' => 4,
                'function_id' => 3
            ],
            [
                'role_id' => 4,
                'function_id' => 7
            ],
            [
                'role_id' => 5,
                'function_id' => 3
            ],
            [
                'role_id' => 5,
                'function_id' => 7
            ],
            [
                'role_id' => 5,
                'function_id' => 8
            ]
        ]);
    }

}
