<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Faisal rabbani',
            'email' => 'farzad.edsoft@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'system',
            'belongs_to' => 0,
            'role_id' => 1,
            'permissions' => 'create, read, update, delete',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'HR Admin',
            'email' => 'hr.admin@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'hr',
            'belongs_to' => 0,
            'role_id' => 2,
            'permissions' => 'create, read, update, delete',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'EMPLOYEE',
            'email' => 'employee@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'employee',
            'belongs_to' => 0,
            'role_id' => 3,
            'permissions' => 'create, read, update',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'CHAIRMAN',
            'email' => 'chairman@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'chairman',
            'belongs_to' => 0,
            'role_id' => 3,
            'permissions' => 'create, read, update',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'DIRECTOR_GENERAL',
            'email' => 'director_general@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'director_general',
            'belongs_to' => 0,
            'role_id' => 3,
            'permissions' => 'create, read, update',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'DIRECTOR_ADMIN',
            'email' => 'director_admin@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'director_admin',
            'belongs_to' => 0,
            'role_id' => 3,
            'permissions' => 'create, read, update',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);

    }
}
