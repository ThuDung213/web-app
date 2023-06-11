<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')-> insert([
            [
                'name' => 'AlHight Company',
                'email' => 'client1@email.com',
                'password' => bcrypt('123456'),
                'phone' => '123456789',
                'avatar'=> '',
                'address' => '123 street',
                'role' => 0,
            ],
            [
                'name' => 'CLow Company',
                'email' => 'client2@email.com',
                'password' => bcrypt('123456'),
                'phone' => '123456789',
                'avatar'=> '',
                'address' => '45 street',
                'role' => 0,
            ],
            [
                'name' => 'JunJun',
                'email' => 'creator@email.com',
                'password' => bcrypt('123456'),
                'phone' => '123456789',
                'avatar'=> '',
                'address' => '123 street',
                'role' => 1,
            ],
            [
                'name' => 'DaDang',
                'email' => 'creator1@email.com',
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
        ]);
        DB::table('clients')-> insert([
            [
                'user_id' => '1',
                'client_name' => 'AlHight Company',
                'address' => '123 street',
                'phone' => '0938294343',
                'email' => 'client1@gmail.com',
                'city' => 'Hanoi',
                'country' => 'Vietnam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '2',
                'client_name' => 'CLow Company',
                'address' => '123 street',
                'phone' => '0938294343',
                'email' => 'client2@gmail.com',
                'city' => 'Hanoi',
                'country' => 'Vietnam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('projects')-> insert([
            [
                'client_id' => '1',
                'project_name' => 'Ecommerce Website',
                'start_date' => '2023-06-12 00:00:00',
                'end_date' => '2023-06-29 00:00:00',
                'status' => 'upcoming',
                'description' => 'Making an Ecommerce Website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_id' => '1',
                'project_name' => 'Education Website',
                'start_date' => '2023-06-12 00:00:00',
                'end_date' => '2023-06-29 00:00:00',
                'status' => 'upcoming',
                'description' => 'Making an Education Website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_id' => '2',
                'project_name' => 'Trading Website',
                'start_date' => '2023-06-12 00:00:00',
                'end_date' => '2023-06-29 00:00:00',
                'status' => 'upcoming',
                'description' => 'Making an Trading Website',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
        DB::table('tasks')-> insert([
            [
                'project_id' => '1',
                'task_name' => 'Making Layout',
                'description' => 'Making Layout using Bootstrap',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => '1',
                'task_name' => 'Design Database',
                'description' => 'Design Database Structure',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => '2',
                'task_name' => 'Making Layout',
                'description' => 'Making Layout using Bootstrap',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('task_assigned')-> insert([
            [
                'creator_id' => '3',
                'task_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'creator_id' => '4',
                'task_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'creator_id' => '3',
                'task_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('working_times')-> insert([
            [
                'creator_id' => '3',
                'project_id' => '1',
                'working_date' => '2023-06-12 00:00:00',
                'working_hours' => '2',
                'working_content' => 'Fix bug',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'creator_id' => '4',
                'project_id' => '1',
                'working_date' => '2023-06-13 00:00:00',
                'working_hours' => '2',
                'working_content' => 'Fix bug',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'creator_id' => '3',
                'task_id' => '2',
                'working_date' => '2023-06-15 00:00:00',
                'working_hours' => '5',
                'working_content' => 'Fix bug',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
