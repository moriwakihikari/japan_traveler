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
            ['area_id' => 1, 'area_name' => '北海道'],
            ['area_id' => 2, 'area_name' => '東北地方'],
            ['area_id' => 3, 'area_name' => '関東地方'],
            ['area_id' => 4, 'area_name' => '中部地方'],
            ['area_id' => 5, 'area_name' => '近畿地方'],
            ['area_id' => 6, 'area_name' => '中国地方'],
            ['area_id' => 7, 'area_name' => '四国地方'],
            ['area_id' => 8, 'area_name' => '九州地方'],
            ]);
    }
}
