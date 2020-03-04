<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrefectureController extends Controller
{
    //
    public function add()
    {
        return view('hikari.prefecture.create');
    }
    
}
