<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Prefecture;

class HomeController extends Controller
{
    //
    public function index()
    {
        $prefectures = Prefecture::all();//後ほどファサード使用layout/front.blade.php

        return view('hikari.home.index', ['prefectures' => $prefectures]);
    }
}
