<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Toukou;

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
    
    public static function in(Request $request)
    {
        $this->validate($request, Toukou::$rules);
        
        $toukou = new Toukou;
        $form = $request->all();
        /*
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $blog->blog_image = basename($path);
        } else {
            $blog->blog_image = null;
        }
        
        unset($form['_token']);
        
        unset($form['image']);
        */
        $toukou->fill($form);
        $toukou->save();
        
        return redirect('hikari/keijiban/in');
    }
       // $toukou = Toukou::orderBy('created_at', 'desc')->get();

    
    
}
