@extends('layouts.front')

@section('title', 'Rondom')

@section('content')

    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>ダーツの旅的な</h2>
                <p>今回の都道府県は「{{ $rondom }}」です。</p>
                <p>おすすめ記事</p>
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
            <input type="button"class="btn btn-primary" onclick="history.back()" value="戻る">
            </div>
        </div>
    </div>
@endsection