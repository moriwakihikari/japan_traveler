<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Prefecture;
use App\Blog;

class RondomController extends Controller
{
    //
    public function index()
    {
        $prefectures = Prefecture::all();

        return view('hikari.rondom.index', ['prefectures' => $prefectures]);
    }
    
    public function result()
    {
        $prefectures = Prefecture::all();
        
        
        $rondom = Prefecture::inRandomOrder('prefecture_name')->first()->prefecture_name;
        
        $blog = Blog::inRandomOrder('blog_id')->first();
        
        /*$fortune = array(
            "北海道",
            "青森",
            "岩手",
            "秋田",
            "宮城",
            "山形",
            "福島",
            "茨城",
            "千葉",
            "栃木",
            "群馬",
            "東京",
            "神奈川",
            "山梨",
            "新潟",
            "長野"
        );
        $count  = count($fortune);
        $random = rand(0, $count - 1);*/
        //$aaa = "TEST";
        return view('hikari.rondom.result',['rondom' => $rondom, 'prefectures' => $prefectures, 'blog' => $blog]);//連想配列　
    }
}
