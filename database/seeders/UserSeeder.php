<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'username' => 'Admin',
                'email' => 'admin@contoh.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
