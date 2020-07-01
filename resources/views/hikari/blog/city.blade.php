@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
        <div class="row">
            <div class="headline col-md-8 mx-auto">
                <div class="row">
                    <input type="hidden" name="city_id" value="{{ $cond_city_id }}">
                    <div class="col-md-6">
                        <div class="caption mx-auto">
                            <div class="blog_image">
                                @if ($headline->blog_image)
                                <img src="{{ $headline->blog_image }}">
                                @endif
                            </div>
                            <div class="blog_title p-2">
                                <h1>{{ str_limit($headline->blog_title, 70) }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="body mx-auto">{{ str_limit($headline->blog_honbun, 650) }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <input type="hidden" name="city_id" value="{{ $cond_city_id }}">
            <div class="blogs col-md-8 mx-auto mt-3">
                @foreach ($blogs as $blog)
                <div class="post">
                    <div class="row">
                        <div class="text col-md-6">
                            <div class="date">
                                {{ $blog->updated_at->format('Y年m月d日') }}
                            </div>
                            <div class="blog_title">
                                {{ str_limit($blog->blog_title, 150) }}
                            </div>
                            <div class="blog_honbun mt-3">
                                {{ str_limit($blog->blog_honbun, 1500) }}
                            </div>
                        </div>
                        <div class="blog_image col-md-6 text-right mx-4">
                            @if ($blog->blog_image)
                            <img src="{{ $blog->blog_image }}">
                            @endif
                        </div>
                    </div>
                </div>
                <hr color="#c0c0c0">
                @endforeach
                <div class="return"><input type="button"class="btn btn-primary" onclick="history.back()" value="戻る"></div>
                
                <div class="d-flex justify-content-center">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection