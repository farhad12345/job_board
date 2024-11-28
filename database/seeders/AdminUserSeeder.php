<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('11223344'), // Use a secure password in production
                'role' => 'admin',
                'mobile' => '123456',
                'cv_text'=>'sda',
                'work_experience'=>'sdad',
                'education'=>'ad',
                'skills'=>'asd'
            ]);
        }
    }
}
