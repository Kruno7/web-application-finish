<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view_users',       'guard_name' => 'web']);
        Permission::create(['name' => 'create_users',     'guard_name' => 'web']);
        Permission::create(['name' => 'edit_users',       'guard_name' => 'web']);
        Permission::create(['name' => 'delete_users',     'guard_name' => 'web']);
        Permission::create(['name' => 'view_apartments',  'guard_name' => 'web']);
        Permission::create(['name' => 'create_apartments','guard_name' => 'web']);
        Permission::create(['name' => 'edit_apartments',  'guard_name' => 'web']);
        Permission::create(['name' => 'delete_apartments','guard_name' => 'web']);
    }
}
