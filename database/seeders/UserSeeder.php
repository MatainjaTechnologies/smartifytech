<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        
        
        App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@smartify.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
        ]);

        App\Models\User::create([
            'name' => 'Regular User',
            'email' => 'user@smartify.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
