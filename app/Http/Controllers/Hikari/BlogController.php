<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //
    public function index()
    {
        return view('hikari.blog.index');
    }
    
    public function create()
    {
        return view('hikari.blog.create');
    }
    
    public function list()
    {
        return view('hikari.blog.list');
    }
    
    public function edit()
    {
        return view('hikari.blog.edit');
    }
    
    public function prefecture()
    {
        return view('hikari.blog.prefecture');
    }
    
    public function city()
    {
        return view('hikari.blog.prefecture.city');
    }
}
