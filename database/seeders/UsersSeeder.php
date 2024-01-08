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
                'name' => 'ja',
                'email' => 'dutmar@gmail.com',
                'password' => 'alanford69',
            ],
            [
                'name' => 'ti',
                'email' => 'dari@gmail.com',
                'password' => 'alanford69',
            ],
            [
                'name' => 'mi',
                'email' => 'dado@gmail.com',
                'password' => 'alanford69',
            ],
            [
                'name' => 'oni',
                'email' => 'daki@gmail.com',
                'password' => 'alanford69',
            ]
        ];

        foreach($users as $key => $value) {
            User::create($value);
        }
    }
}
