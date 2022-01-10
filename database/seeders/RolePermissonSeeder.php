<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_permissions')->insert(
            [
                'role_id'=> 1,
                'permission_id' => 1,
            ],
            [
                'role_id'=> 1,
                'permission_id' => 2,
            ],
            [
                'role_id'=> 1,
                'permission_id' => 3,
            ]
        );
    }
}
