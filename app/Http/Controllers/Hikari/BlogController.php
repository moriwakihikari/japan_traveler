<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blog;
use App\Prefecture;

class BlogController extends Controller
{
    protected $blog;
    protected $prefecture;
    
    const NUM_PER_PAGE = 10;
    
    function __construct(Blog $blog, Prefecture $prefecture)
    {
        $this->blog = $blog;
        $this->prefecture = $prefecture;
    }
    
    public function index(Request $request)
    {
        $input = $request->input();
        
        $list = $this->blog->getBlogList(self::NUM_PER_PAGE, $input);
        
        $list->appends($input);
        
        $prefecture_list = $this->prefecture->getPrefectureList();
        
        $mounth_list = $this->blog->getMonthList();
        
        
        
        //$list = $this->prefecture->getPrefectureList(self::NUM_PER_PAGE);
        return view('hikari.blog.index', compact('list', 'month_list', 'prefecture_list'));
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
            $blog->blog_image = basename($path);
        } else {
            $blog->blog_image = null;
        }
        
        unset($form['_token']);
        
        unset($form['image']);
        
        $blog->fill($form);
        $blog->save();
        
        return redirect('hikari/blog/create');
    }
    
    public function list(Request $request)
    {
        $cond_blog_title = $request->cond_blog_title;
        if ($cond_blog_title != '') {
            $posts = Blog::where('blog_title', $cond_blog_title)->get();
        } else {
            $posts = Blog::all();
        }
        return view('hikari.blog.list', ['posts' => $posts, 'cond_blog_title' => $cond_blog_title]);
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
