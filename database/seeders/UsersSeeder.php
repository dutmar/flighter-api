<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => 'admin123',
                'admin_privilege' => 'true',
            ]
        ];

        foreach($users as $key => $value) {
            User::create($value);
        }
    }
}
