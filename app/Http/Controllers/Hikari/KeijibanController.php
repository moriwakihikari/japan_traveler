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
use Image;
use Carbon\Carbon;

class KeijibanController extends Controller
{
    //
    public function index(Request $request)
    {
        $prefectures = Prefecture::all();
        
        $cond_thread_title = $request->cond_thread_title;
        if ($cond_thread_title != '') {
            $posts = Thread::where('thread_title', $cond_thread_title)->orderby('created_at', 'desc')->get();
        } else {
            $posts = Thread::orderBy('created_at', 'desc')->get();
        }
        

        // $cond_thread_id = $request->thread_id;
        // $thread_id = Toukou::where('thread_id', $cond_thread_id)->get();
        
        
        return view('hikari.keijiban.index', ['prefectures' => $prefectures, 'posts' => $posts, 'cond_thread_title' => $cond_thread_title]);
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
        $posts = Toukou::where('thread_id', $cond_thread_id)->orderby('created_at', 'desc')->paginate(5);

        return view('hikari.keijiban.in', ['prefectures' => $prefectures, 'posts'=> $posts, 'cond_thread_id' => $cond_thread_id]);
    }
       // $toukou = Toukou::orderBy('created_at', 'desc')->get();
       
       
    public function toukou(Request $request)
    {
        $this->validate($request, Toukou::$rules);
        
        $toukou = new Toukou;
        $form = $request->all();
        
        if (isset($form['toukou_image'])) {
        $file = $request->file('toukou_image');
            $now = date_format(Carbon::now(), 'YmdHis');
            $name = $file->getClientOriginalName();
            $storePath="japan_traveler/".$now."_".$name;
            $image = Image::make($file)->resize(500, 375)->encode('jpg');
            $hash = md5($image->__toString());
            $path = "japan_traveler/{$hash}.jpg";
            Storage::disk('s3')->put($path, $image, 'public');
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
