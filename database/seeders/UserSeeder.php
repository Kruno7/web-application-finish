<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $renterRole = Role::where('name', 'renter')->first();
        $userRole = Role::where('name', 'user')->first();*/
        
        $admin = User::create([
            'first_name'  => 'Admin',
            'last_name'  => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);
        $renter = User::create([
            'first_name'  => 'Renter',
            'last_name'  => 'Renter',
            'email' => 'renter@gmail.com',
            'password' => Hash::make('renter')
        ]);
        $user = User::create([
            'first_name'  => 'User',
            'last_name'  => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user')
        ]);

        $admin->assignRole('admin');
        $renter->assignRole('renter');
        $user->assignRole('user');
        //$user_admin = User::find(14);
        //$user_admin->assignRole('admin');
    }
}
