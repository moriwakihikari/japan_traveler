<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrefectureController extends Controller
{
    //
    public function index()
    {
        return view('hikari.prefecture.index');
    }
    
    public function create()
    {
        return view('hikari.prefecture.create');
    }
    
    public function osaka()
    {
        return view('hikari.prefecture.osaka');
    }
    
    public function osaka_osaka()
    {
        return view('hikari.prefecture.osakacityphp');
    }
    
    public function edit()
    {
        return view('hikari.prefecture.edit');
    }
    
    public function delete()
    {
        return redirect('hikari/prefecture/delete');
    }
}
