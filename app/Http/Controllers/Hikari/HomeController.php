<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Prefecture;
use App\Blog;
use Storage;

class HomeController extends Controller
{
    //
    public function index()
    {
        $prefectures = Prefecture::all();//後ほどファサード使用layout/front.blade.php
        $blogs = Blog::all();

        return view('hikari.home.index', ['prefectures' => $prefectures, 'blogs' => $blogs]);
    }
}
