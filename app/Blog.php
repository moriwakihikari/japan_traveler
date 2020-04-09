<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = array('blog_id');
    
    public static $rules = array(
        'blog_title' => 'required',
        'blog_honbun' => 'required',
        'prefecture_list' => 'required',
        );
        
        public function messages()
        {
            return [
                'year.integer'        => '年は整数にしてください',
                'month.integer'       => '月は整数にしてください',
                'prefecture_id.integer' => 'カテゴリーIDは整数にしてください',
                'prefecture_id.min'     => 'カテゴリーIDは1以上にしてください',
            ];
        }
        
        public function prefecture()
        {
            return $this->hasOne('App\Prefecture', 'prefecture_id', 'prefecture_id');
        }
        
        public function getBlogList(int $num_per_page = 10, array $condition = [])
        {
            // パラメータの取得
            $prefecture_id = array_get($condition, 'prefecture_id');
            $year        = array_get($condition, 'year');
            $month       = array_get($condition, 'month');

            // Eager ロードの設定を追加
            $query = $this->with('prefecture')->orderBy('blog_id', 'desc');

            // カテゴリーIDの指定
            if ($prefecture_id) {
                $query->where('prefecture_id', $prefecture_id);
            }

            // 期間の指定
            if ($year) {
                if ($month) {
                    // 月の指定がある場合はその月を設定し、Carbonインスタンスを生成
                    $start_date = Carbon::createFromDate($year, $month, 1);
                    $end_date   = Carbon::createFromDate($year, $month, 1)->addMonth();     // 1ヶ月後
                } else {
                    // 月の指定が無い場合は1月に設定し、Carbonインスタンスを生成
                    $start_date = Carbon::createFromDate($year, 1, 1);
                    $end_date   = Carbon::createFromDate($year, 1, 1)->addYear();           // 1年後
                }
                // Where句を追加
                $query->where('post_date', '>=', $start_date->format('Y-m-d'))
                      ->where('post_date', '<',  $end_date->format('Y-m-d'));
            }

            // paginate メソッドを使うと、ページネーションに必要な全件数やオフセットの指定などは全部やってくれる
            return $query->paginate($num_per_page);
        }
}
