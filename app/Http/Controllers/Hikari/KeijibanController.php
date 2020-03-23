<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeijibanController extends Controller
{
    //
    public function index()
    {
        return view('hikari.keijiban.index');
    }
    
    public function add()
    {
        return view('hikari.keijiban.create');
    }
    
    public function create()
    {
        return redirect('hikari/keijiban/create');
    }
    
    public function edit()
    {
        return view('hikari.keijiban.edit');
    }
    
    public function update()
    {
        return redirect('hikari/keijiban/edit');
    }
    
    public function in()
    {
        return view('hikari.keijiban.in');
    }
    
    
}
