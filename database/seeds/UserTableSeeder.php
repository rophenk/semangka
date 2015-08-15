<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data untuk table users
        DB::table('users')->insert([
        'name' => 'Administrator',
        'email' => 'admin@simapta.com',
        'password' => bcrypt('123'),
        'instansi_id' => '1',
        'is_admin' => '1',
        'role_id' => '1',
        ]);
    }
}
