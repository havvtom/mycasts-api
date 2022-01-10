<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(
            [
                'id'=> 1,
                'name' => 'create video',
            ],
            [
                'id'=> 2,
                'name' => 'delete video'
            ],
            [
                'id'=> 3,
                'name' => 'edit video'
            ]
        );
    }
}
