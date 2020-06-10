<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['city_id' => 1, 'city_name' => '稚内', 'prefecture_id' => 1],
            ]);
    }
}
