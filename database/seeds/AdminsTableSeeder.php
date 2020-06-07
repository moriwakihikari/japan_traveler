<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            ['user_id' => 1, 'user_name' => 'admin', 'email' => 'test@test.com', 'password' => 'password123'],
            ]);
    }
}
