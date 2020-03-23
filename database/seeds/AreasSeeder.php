<?php

use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            ['area_name' => '北海道'],
            ['area_name' => '東北地方'],
            ['area_name' => '関東地方'],
            ['area_name' => '中部地方'],
            ['area_name' => '近畿地方'],
            ['area_name' => '中国地方'],
            ['area_name' => '四国地方'],
            ['area_name' => '九州地方'],
            ]);
    }
}
