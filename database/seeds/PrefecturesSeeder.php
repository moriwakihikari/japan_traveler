<?php

use Illuminate\Database\Seeder;

class PrefecturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->insert([
            ['area_id' => 1, 'prefecture_id' => 1, 'prefecture_name' => '北海道'],
            ['area_id' => 2, 'prefecture_id' => 2, 'prefecture_name' => '青森'],
            ['area_id' => 2, 'prefecture_id' => 3, 'prefecture_name' => '秋田'],
            ['area_id' => 2, 'prefecture_id' => 4, 'prefecture_name' => '岩手'],
            ['area_id' => 2, 'prefecture_id' => 5, 'prefecture_name' => '山形'],
            ['area_id' => 2, 'prefecture_id' => 6, 'prefecture_name' => '宮城'],
            ['area_id' => 2, 'prefecture_id' => 7, 'prefecture_name' => '福島'],
            ['area_id' => 3, 'prefecture_id' => 8, 'prefecture_name' => '栃木'],
            ['area_id' => 3, 'prefecture_id' => 9, 'prefecture_name' => '群馬'],
            ['area_id' => 3, 'prefecture_id' => 10, 'prefecture_name' => '茨城'],
            ['area_id' => 3, 'prefecture_id' => 11, 'prefecture_name' => '埼玉'],
            ['area_id' => 3, 'prefecture_id' => 12, 'prefecture_name' => '千葉'],
            ['area_id' => 3, 'prefecture_id' => 13, 'prefecture_name' => '東京'],
            ['area_id' => 3, 'prefecture_id' => 14, 'prefecture_name' => '神奈川'],
            ['area_id' => 4, 'prefecture_id' => 15, 'prefecture_name' => '新潟'],
            ['area_id' => 4, 'prefecture_id' => 16, 'prefecture_name' => '長野'],
            ['area_id' => 4, 'prefecture_id' => 17, 'prefecture_name' => '山梨'],
            ['area_id' => 4, 'prefecture_id' => 18, 'prefecture_name' => '静岡'],
            ['area_id' => 4, 'prefecture_id' => 19, 'prefecture_name' => '富山'],
            ['area_id' => 4, 'prefecture_id' => 20, 'prefecture_name' => '石川'],
            ['area_id' => 4, 'prefecture_id' => 21, 'prefecture_name' => '福井'],
            ['area_id' => 4, 'prefecture_id' => 22, 'prefecture_name' => '岐阜'],
            ['area_id' => 4, 'prefecture_id' => 23, 'prefecture_name' => '愛知'],
            ['area_id' => 5, 'prefecture_id' => 24, 'prefecture_name' => '滋賀'],
            ['area_id' => 5, 'prefecture_id' => 25, 'prefecture_name' => '三重'],
            ['area_id' => 5, 'prefecture_id' => 26, 'prefecture_name' => '京都'],
            ['area_id' => 5, 'prefecture_id' => 27, 'prefecture_name' => '奈良'],
            ['area_id' => 5, 'prefecture_id' => 28, 'prefecture_name' => '和歌山'],
            ['area_id' => 5, 'prefecture_id' => 29, 'prefecture_name' => '大阪'],
            ['area_id' => 5, 'prefecture_id' => 30, 'prefecture_name' => '兵庫'],
            ['area_id' => 6, 'prefecture_id' => 31, 'prefecture_name' => '鳥取'],
            ['area_id' => 6, 'prefecture_id' => 32, 'prefecture_name' => '岡山'],
            ['area_id' => 6, 'prefecture_id' => 33, 'prefecture_name' => '島根'],
            ['area_id' => 6, 'prefecture_id' => 34, 'prefecture_name' => '広島'],
            ['area_id' => 6, 'prefecture_id' => 35, 'prefecture_name' => '山口'],
            ['area_id' => 7, 'prefecture_id' => 36, 'prefecture_name' => '徳島'],
            ['area_id' => 7, 'prefecture_id' => 37, 'prefecture_name' => '香川'],
            ['area_id' => 7, 'prefecture_id' => 38, 'prefecture_name' => '愛媛'],
            ['area_id' => 7, 'prefecture_id' => 39, 'prefecture_name' => '高知'],
            ['area_id' => 8, 'prefecture_id' => 40, 'prefecture_name' => '福岡'],
            ['area_id' => 8, 'prefecture_id' => 41, 'prefecture_name' => '佐賀'],
            ['area_id' => 8, 'prefecture_id' => 42, 'prefecture_name' => '長崎'],
            ['area_id' => 8, 'prefecture_id' => 43, 'prefecture_name' => '大分'],
            ['area_id' => 8, 'prefecture_id' => 44, 'prefecture_name' => '宮崎'],
            ['area_id' => 8, 'prefecture_id' => 45, 'prefecture_name' => '熊本'],
            ['area_id' => 8, 'prefecture_id' => 46, 'prefecture_name' => '鹿児島'],
            ['area_id' => 8, 'prefecture_id' => 47, 'prefecture_name' => '沖縄'],
            ]);
    }
}
