<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name'     => 'Admin StudyMatch',
            'email'    => 'admin@studymatch.com',
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole('admin');
    }
}