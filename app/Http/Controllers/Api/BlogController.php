<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blog;
use App\Prefecture;
use App\Area;
use App\City;
use App\Admin;

class BlogController extends Controller
{
    public function saveBlog(Request $request)
    {
        $data = $request->validate([]);
        
        $blog = new Blog();
        $blog->fill($data);
        $blog->author()->associate(\Admin::user());
        $blog->save();
        return view('hikari.blog.create');
    }
    
    /*protected $blog;
    protected $prefecture;
    
    const NUM_PER_PAGE = 10;
    
    
    
    function __construct(Blog $blog, Prefecture $prefecture)
    {
        $this->blog = $blog;
        $this->prefecture = $prefecture;
    }*/
    
    public function index()
    {
        $areas = Area::all();
        $prefectures = Prefecture::all();
        /*$input = $request->input();
        
        $list = $this->blog->getBlogList(self::NUM_PER_PAGE, $input);
        
        $list->appends($input);
        
        $prefecture_list = $this->prefecture->getPrefectureList();
        
        $mounth_list = $this->blog->getMonthList();
        
        
        
        //$list = $this->prefecture->getPrefectureList(self::NUM_PER_PAGE);*/
        return view('hikari.blog.index', ['areas' => $areas, 'prefectures' => $prefectures]);         /*compact('list', 'month_list', 'prefecture_list'));*/
    }
    
    public function add()
    {
        $prefectures = Prefecture::all();
        $cities = City::all();
        $admins = Admin::all();//author_id,change_idをphpmyadminのnullにチェックして対応 viewも大分意味が分からない物に。。。

        return view('hikari.blog.create', ['prefectures' => $prefectures, 'cities' => $cities, 'admins' => $admins]);
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
    
    public function edit(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        if (empty($blog)) {
            abort(404);
        }
        return view('hikari.blog.edit', ['blog_form' => $blog]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Blog::$rules);
        $blog = Blog::find($request->blog_id);
        $blog_form = $request->all();
        if (isset($blog_form['blog_image']))
        {
            $path = $request->file('blog_image')->store('public/image');
            $blog->image_path = basename($path);
            unset($blog_form['blog_image']);
        }elseif(isset($request->remove))
        {
            $blog->image_path = null;
            unset($blog_form['remove']);
        }
        unset($blog_form['_token']);
        
        $blog->fill($blog_form)->save();
        
        return redirect('hikari/blog/edit');
    }
    
    public function prefecture()
    {
        $prefectures = Prefecture::all();

        return view('hikari.blog.prefecture', ['prefectures' => $prefectures]);
    }
    
    public function city()
    {
        $prefectures = Prefecture::all();

        return view('hikari.blog.city', ['prefectures' => $prefectures]);
    }
}