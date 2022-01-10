<?php

namespace Database\Seeders;

use Database\Seeders\PermissionSeeder;
use Database\Seeders\RolePermissonSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserRoleSeeder;
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
            // PermissionSeeder::class,
            RoleSeeder::class,
            RolePermissonSeeder::class,            
            UserRoleSeeder::class
        ]);
        
    }
}
