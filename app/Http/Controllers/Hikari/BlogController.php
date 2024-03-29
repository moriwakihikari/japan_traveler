<?php

namespace App\Http\Controllers\Hikari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blog;
use App\Prefecture;
use App\Area;
use App\City;
use App\Admin;
use Storage;
use Image;
use Carbon\Carbon;

class BlogController extends Controller
{
    // public function saveBlog(Request $request)
    // {
    //     $data = $request->validate([]);
        
    //     $blog = new Blog();
    //     $blog->fill($data);
    //     $blog->author()->associate(\Admin::user());
    //     $blog->save();
    //     return view('hikari.blog.create');
    // }
    
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
        }//heroku logs -tでjquary動き確認
        return $arrOption;
    }
    
    
    public function create(Request $request)
    {
        $this->validate($request, Blog::$rules);
        
        $blog = new Blog;
        $form = $request->all();
        
        
        if (isset($form['blog_image'])) {
            $file = $request->file('blog_image');
            $now = date_format(Carbon::now(), 'YmdHis');
            $name = $file->getClientOriginalName();
            $storePath="japan_traveler/".$now."_".$name;
            $image = Image::make($file)->resize(500, 375)->encode('jpg');
            $hash = md5($image->__toString());
            $path = "japan_traveler/{$hash}.jpg";
            Storage::disk('s3')->put($path, $image, 'public');
            $blog->blog_image = Storage::disk('s3')->url($path);
           
        } else {
            $blog->blog_image = null;
        }
        //  if (isset($form['blog_image'])) {
        // dd($request->file('blog_image'));            
        // $path = Storage::disk('s3')->putFile('/',$form['blog_image'],'public');
        //     dd($path);
        //     $blog->blog_image = Storage::disk('s3')->url($path);
        // } else {
        //     $blog->blog_image = null;
        // }   
        
        unset($form['_token']);
        
        unset($form['blog_image']);
        
        $blog->fill($form);
        $blog->save();
        
        return redirect('admin/blog/list');//redirctに連想配列は使えない
    }
    
    public function list(Request $request)
    {
        // $blogs = Blog::all();
        // $blogs = Blog::paginate(10);
        
        $cond_blog_title = $request->cond_blog_title;
        if ($cond_blog_title != '') {
            $posts = Blog::where('blog_title', $cond_blog_title)->orderby('created_at', 'desc')->paginate(10);
        } else {
            $posts = Blog::orderby('created_at', 'desc')->paginate(10);
        }
        
        return view('hikari.blog.list', ['posts' => $posts, 'cond_blog_title' => $cond_blog_title]);
    }
    
    public function edit(Request $request)
    {
        $prefectures = Prefecture::all();
        $cities = City::all();
        // dd($prefectures);
        
        $blog = Blog::find($request->blog_id);
        if (empty($blog)) {
            abort(404);
        }
        return view('hikari.blog.edit', ['blog_form' => $blog,'prefectures' => $prefectures,'cities' => $cities]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Blog::$rules);
    
        $blog = Blog::find($request->blog_id);
        $form = $request->all();
        
       if (isset($form['blog_image'])) {
            $file = $request->file('blog_image');
            $now = date_format(Carbon::now(), 'YmdHis');
            $name = $file->getClientOriginalName();
            $storePath="japan_traveler/".$now."_".$name;
            $image = Image::make($file)->resize(500, 375)->encode('jpg');
            $hash = md5($image->__toString());
            $path = "japan_traveler/{$hash}.jpg";
            Storage::disk('s3')->put($path, $image, 'public');
            $blog->blog_image = Storage::disk('s3')->url($path);
           
        } elseif(isset($request->remove)) {
            $blog->blog_image = null;
            unset($blog_form['remove']);
        } 
        // if (isset($blog_form['blog_image'])) {
        //     $path = Storage::disk('s3')->putFile('/',$blog_form['blog_image'],'public');
        //     $blog->blog_image = Storage::disk('s3')->url($path);
        //     unset($blog_form['blog_image']);
        // } elseif(isset($request->remove)) {
        //     $blog->image_path = null;
        //     unset($blog_form['remove']);
        // }
        unset($form['_token']);
        unset($form['blog_image']);
        
        $blog->fill($form)->save();
        
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
        $blogs = Blog::where('city_id', $cond_city_id)->orderby('created_at', 'desc')->paginate(3);

        if (count($blogs) > 0) {
            $headline = $blogs->shift();
        } else {
            $headline = null;
        }
        

        return view('hikari.blog.city', ['prefectures' => $prefectures, 'headline' => $headline, 'blogs' => $blogs, 'cond_city_id' => $cond_city_id, 'cities' => $cities]);
    }
}
