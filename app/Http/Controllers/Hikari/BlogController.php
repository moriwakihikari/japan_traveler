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
    
    public function add()
    {
        return view('hikari.blog.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Blog::$rules);
        
        $blog = new Blog;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $blog->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        
        unset($form['_token']);
        
        unset($form['image']);
        
        $blog->fill($form);
        $blog->save();
        
        return redirect('hikari/blog/create');
    }
    
    public function list(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Blog::where('title', $cond_title)->get();
        } else {
            $posts = Blog::all();
        }
        return view('hikari.blog.list', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit()
    {
        return view('hikari.blog.edit');
    }
    
    public function update()
    {
        return redirect('hikari/blog/edit');
    }
    
    public function prefecture()
    {
        return view('hikari.blog.prefecture');
    }
    
    public function city()
    {
        return view('hikari.blog.city');
    }
}
