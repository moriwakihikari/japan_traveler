<?php

namespace App\Http\Controllers\Hikari;

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
    
    public function index(Request $request)
    {
        $prefectures = Prefecture::all();
        
        $prefecturesList = array();
        
        $areas = Area::all();

        foreach($areas as $area){
            $prefecturesList[$area->area_id] = $area->prefecture;
        }
        
        $areaInfo = Area::all();
        
        $areaList = array();
        foreach($areaInfo as $area)
        {
            $areaList[$area->area_id][] = $area->prefecture();
        }
        
        $cond_prefecture_id = $request->prefecture_id;
        $prefecture_id = City::where('prefecture_id', $cond_prefecture_id)->get();
        /*$input = $request->input();
        
        $list = $this->blog->getBlogList(self::NUM_PER_PAGE, $input);
        
        $list->appends($input);
        
        $prefecture_list = $this->prefecture->getPrefectureList();
        
        $mounth_list = $this->blog->getMonthList();
        
        
        
        //$list = $this->prefecture->getPrefectureList(self::NUM_PER_PAGE);*/
        return view('hikari.blog.index', ['prefectures' => $prefectures, 'areaInfo' => $areaInfo, 'prefecturesList' => $prefecturesList, 'cond_prefecture_id' => $cond_prefecture_id]);         /*compact('list', 'month_list', 'prefecture_list'));*/
    }
    
    public function add()
    {
        $prefectures = Prefecture::all();
        $cities = City::all();


        return view('hikari.blog.create',['prefectures' => $prefectures,'cities' => $cities]);
    }
    
    public function selectCity(Request $request)
    {
        $arr_cities = City::where('prefecture_id', $request->prefecture)->get();
        $arrOption = array();
        foreach($arr_cities as $city){
            array_push($arrOption, '<option value="'.$city['city_id'].'">'.$city['city_name'].'</option>');
        }
        return $arrOption;
    }
    
    
    public function create(Request $request)
    {
        $this->validate($request, Blog::$rules);
        
        $blog = new Blog;
        $form = $request->all();
        
        if (isset($form['blog_image'])) {
            // $imagefile = $request->file('blog_image');
            // $path = $imagefile->store('storage/image');
        // dd($request->file('blog_image'));            
        $path = $request->file('blog_image')->store('public/image');
            // dd($path);
            $blog->blog_image = basename($path);
        } else {
            $blog->blog_image = null;
        }
        
        unset($form['_token']);
        
        unset($form['blog_image']);
        
        $blog->fill($form);
        $blog->save();
        
        return redirect('admin/blog/list');
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
        return view('hikari.blog.edit', ['blog_form' => $blog]);//redirctに連想配列は使えない
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
        
        return redirect('admin/blog/list');
    }
    
    public function delete(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $blog->delete();
        
        return redirect('admin/blog/list');
    }
    
    public function prefecture(Request $request)
    {
        $prefectures = Prefecture::all();
        
        
        /*$cities = array();
        foreach ($prefectures as $cities) {
        $cities[] = array(
            'city_id' => $cities->city_id,
        );
    }*/
        /*$cityList = array();
        foreach($cities as $city)
        {
            $cityList[$city->city_id][] = $city->city_id;
        }*/
        $cond_prefecture_id = $request->prefecture_id;
        $prefecture_id = City::where('prefecture_id', $cond_prefecture_id)->get();
        
        
        /*$cond_city_id = $request->city_id;
        $city_id = Blog::where('city_id', $cond_city_id)->get();*/
        
        return view('hikari.blog.prefecture', ['prefectures' => $prefectures, 'prefecture_id' => $prefecture_id, 'cond_prefecture_id' => $cond_prefecture_id]);
        //return view('hikari.blog.prefecture', ['prefectures' => $prefectures, 'cities' => $cities, 'city_id' => $city_id, 'cond_city_id' => $cond_city_id]);

    }
    
    public function city(Request $request)
    {
        
        $prefectures = Prefecture::all();
        $cities = City::all();
        
        $cond_city_id = $request->city_id;
        $blogs = Blog::where('city_id', $cond_city_id)->get();
        
        if (count($blogs) > 0) {
            $headline = $blogs->shift();
        } else {
            $headline = null;
        }
        

        return view('hikari.blog.city', ['prefectures' => $prefectures, 'headline' => $headline, 'blogs' => $blogs, 'cond_city_id' => $cond_city_id, 'cities' => $cities]);
    }
}
