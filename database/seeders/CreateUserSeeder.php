<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'User',
                'email' => 'user@email.com',
                'password' => bcrypt('123456'),
                'phone' => '123456789',
                'avatar'=> '',
                'address' => '123 street',
                'role' => 0,
            ],
            [
                'name' => 'Creator',
                'email' => 'creator@email.com',
                'password' => bcrypt('123456'),
                'phone' => '123456789',
                'avatar'=> '',
                'address' => '123 street',
                'role' => 1,
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => bcrypt('123456'),
                'phone' => '123456789',
                'avatar'=> '',
                'address' => '123 street',
                'role' => 2,
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
