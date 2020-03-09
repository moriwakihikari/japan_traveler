<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RondomController extends Controller
{
    //
    public function index()
    {
        return view('hikari.rondom.index');
    }
    
    public function result()
    {
        return view('hikari.rondom.result');
    }
}
