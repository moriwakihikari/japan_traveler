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
            // ['city_name' => '稚内', 'prefecture_id' => 1],
            // ['city_name' => '札幌', 'prefecture_id' => 1],
            // ['city_name' => '青森', 'prefecture_id' => 2],
            // ['city_name' => '大間', 'prefecture_id' => 2],    
            // ['city_name' => '小樽', 'prefecture_id' => 1],
            // ['city_name' => '十和田', 'prefecture_id' => 2],
            ['city_name' => '秋田', 'prefecture_id' => 3],
            ]);
    }
}
