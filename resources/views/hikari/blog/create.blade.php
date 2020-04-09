@extends('layouts.hikari')

@section('title', 'ブログの新規作成')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>ブログの新規作成</h2>
            <form action="{{ action('Hikari\BlogController@create') }}" method="post" enctype="multipart/form-data">
                
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="dropdown">
                <select class="form-control" name="prefecture">
                    <option value="1">北海道</option>
                    <option value="2">青森</option>
                    <option value="3">岩手</option>
                </select>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="blog_title">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="blog_title" value="{{ old('blog_title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">本文</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="blog_honbun" rows="20">{{ old('blog_honbun') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="blog_image">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection