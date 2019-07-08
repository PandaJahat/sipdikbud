<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Operator',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'researcher',
            'display_name' => 'Peneliti',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'reviewer',
            'display_name' => 'Reviewer',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'public',
            'display_name' => 'Pengguna Publik',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@app.com',
            'password' => Hash::make('admin'),

            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
            'user_type' => 'App\User'
        ]);

        DB::table('users')->insert([
            'name' => 'Peneliti',
            'email' => 'peneliti@app.com',
            'password' => Hash::make('peneliti'),

            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 2,
            'user_type' => 'App\User'
        ]);
        DB::table('user_profiles')->insert([
            "user_id" => 2,
            "fullname" => 'Peneliti',
            "date_of_birth" => '2000-01-01',
            "institute" => 'Pengembang Aplikasi',
            "gender_id" => 1,
            "email" => 'peneliti@app.com',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Reviewer',
            'email' => 'reviewer@app.com',
            'password' => Hash::make('reviewer'),

            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => 3,
            'user_type' => 'App\User'
        ]);
        DB::table('user_profiles')->insert([
            "user_id" => 3,
            "fullname" => 'Reviewer',
            "date_of_birth" => '2000-01-01',
            "institute" => 'Pengembang Aplikasi',
            "gender_id" => 1,
            "email" => 'reviewer@app.com',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Pengguna',
            'email' => 'pengguna@app.com',
            'password' => Hash::make('pengguna'),

            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 4,
            'user_type' => 'App\User'
        ]);
        DB::table('user_profiles')->insert([
            "user_id" => 4,
            "fullname" => 'Pengguna',
            "date_of_birth" => '2000-01-01',
            "institute" => 'Pengembang Aplikasi',
            "gender_id" => 1,
            "email" => 'pengguna@app.com',

            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
