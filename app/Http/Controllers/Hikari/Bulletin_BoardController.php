<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Bulletin_BoardController extends Controller
{
    //
    public function index()
    {
        return view('hikari.bulltin_board.index');
    }
    
    public function thread()
    {
        return view('hikari.bulltin_board.thread');
    }
    
    public function thread_create()
    {
        return redirect('hikari/bulltin_board/thread/create');
    }
    
    public function thread_edit()
    {
        return redirect('hikari/bulltin_board/thread/edit');
    }
    
    public function thread_delete()
    {
        return redirect('hikari/bulltin_board/thread/delete');
    }
    
    public function in()
    {
        return view('hikari.bulltin_board.in');
    }
    
    public function in_edit()
    {
        return redirect('hikari/bulltin_board/in/edit');
    }
    
    public function in_delete()
    {
        return redirect('hikari/bulltin_board/in/delete');
    }
}
