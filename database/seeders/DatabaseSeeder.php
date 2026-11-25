<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Super Admin', 'email' => 'superadmin@yayasan.test', 'role' => 'super_admin'],
            ['name' => 'Ketua Yayasan', 'email' => 'ketua@yayasan.test', 'role' => 'ketua_yayasan'],
            ['name' => 'Admin Rumah', 'email' => 'rumah@yayasan.test', 'role' => 'admin_rumah'],
            ['name' => 'Admin Keuangan', 'email' => 'keuangan@yayasan.test', 'role' => 'admin_keuangan'],
            ['name' => 'Admin Humas', 'email' => 'humas@yayasan.test', 'role' => 'admin_humas'],
        ];

        foreach ($users as $user) {
            \App\Models\User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => bcrypt('password123'),
                    'role' => $user['role'],
                ]
                );
        }
    }
}
