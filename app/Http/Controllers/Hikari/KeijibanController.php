<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Toukou;
use App\Prefecture;
use App\Thread;
use App\User;
use App\Admin;
use Storage;

class KeijibanController extends Controller
{
    //
    public function index(Request $request)
    {
        $prefectures = Prefecture::all();
        
        $cond_thread_title = $request->cond_thread_title;
        if ($cond_thread_title != '') {
            $posts = Thread::where('thread_title', $cond_thread_title)->get();
        } else {
            $posts = Thread::all();
        }
        
        //$thread = Thread::findOrFail($request);
        $thread = Thread::all();
        
        // $cond_thread_id = $request->thread_id;
        // $thread_id = Toukou::where('thread_id', $cond_thread_id)->get();
        
        
        return view('hikari.keijiban.index', ['prefectures' => $prefectures, 'posts' => $posts, 'cond_thread_title' => $cond_thread_title, 'thread' => $thread]);
    }
    
    public function add()
    {
        $prefectures = Prefecture::all();
        $users = User::all();
        
        return view('hikari.keijiban.create', ['prefectures' => $prefectures, 'users' => $users]);
    }
    
    public function create(Request $request)
    {
        $prefectures = Prefecture::all();
        
        $this->validate($request, Thread::$rules);
        
        $thread = new Thread;
        $form = $request->all();
        
        unset($form['_token']);
        unset($form['image']);
        
        $thread->fill($form);
        $thread->save();
        
        return redirect('hikari/keijiban/index');
    }
    
    public function edit(Request $request)
    {

        $thread = Thread::find($request->thread_id);
        if (empty($thread)) {
            abort(404);
        }
        
        return view('hikari.keijiban.edit', ['thread_form' => $thread]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Thread::$rules);
        $thread = Thread::find($request->thread_id);
        $thread_form = $request->all();
        
        unset($thread_form['_token']);
        
        $thread->fill($thread_form)->save();
        
        return redirect('hikari/keijiban/index');
    }
    
    public function delete(Request $request)
    {
        $thread = Thread::find($request->thread_id);
        $thread->delete();
        
        return redirect('hikari/keijiban/index');
    }
    
    public function in(Request $request)
    {
        $prefectures = Prefecture::all();
        
        $cond_thread_id = $request->thread_id;
        $posts = Toukou::where('thread_id', $cond_thread_id)->get();
            
        return view('hikari.keijiban.in', ['prefectures' => $prefectures, 'posts'=> $posts, 'cond_thread_id' => $cond_thread_id]);
    }
       // $toukou = Toukou::orderBy('created_at', 'desc')->get();
       
       
    public function toukou(Request $request)
    {
        //$threads = Thread::all();
        $this->validate($request, Toukou::$rules);
        
        $toukou = new Toukou;
        $form = $request->all();
        //$toukou = new Toukou;
        //$form = $request->all();
        if (isset($form['toukou_image'])) {
            $path = Storage::disk('s3')->putFile('/',$form['toukou_image'],'public');
            $toukou->toukou_image = Storage::disk('s3')->url($path);
        } else {
            $toukou->toukou_image = null;
        }
        
        unset($form['_token']);
        
        unset($form['toukou_image']);
        
        $toukou->fill($form);
        $toukou->save();
        
        
            
        $cond_thread_id = $request->thread_id;

        return redirect('hikari/keijiban/thread/in?thread_id='.$cond_thread_id);
    }
}
