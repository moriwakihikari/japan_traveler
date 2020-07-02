@extends('layouts.hikari')
@section('title', '投稿済記事一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>記事一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Hikari\BlogController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Hikari\BlogController@list') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_blog_title" value="{{ $cond_blog_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach($posts as $blog)
                                <tr>
                                    <th>{{ $blog->blog_id }}</th>
                                    <th>{{ \Str::limit($blog->blog_title, 100) }}</th>
                                    <th>{{ \Str::limit($blog->blog_honbun, 250) }}</th>
                                    <th>
                                    <div>
                                        <a href="{{ action('Hikari\BlogController@edit', ['blog_id' => $blog->blog_id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ action('Hikari\BlogController@delete', ['blog_id' => $blog->blog_id]) }}">削除</a>
                                    </div>
                                    </th>
                                </tr>
                            @endforeach
                        </body>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{$posts->appends(request()->input())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection