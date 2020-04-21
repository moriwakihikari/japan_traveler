<script src="{{ secure_asset('js/test.js') }}" defer></script>

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
                    <select id="prefecture_id" class="form-control" name="prefecture_id">
                        @foreach($prefectures as $val)
                        <option value="{{ $val->prefecture_id }}">{{ $val->prefecture_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="dropdown">
                    <select id="city_id" class="form-control" name="city_id">
                        @foreach($cities as $val)
                        <option value="{{ $val->city_id }}">{{ $val->city_name }}</option>
                        @endforeach
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
                <div class="dropdown">
                    <select class="form-control" name="author_id">
                        @foreach($admins as $val)
                        <option value="{{ $val->admin_id }}">{{ $val->user_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="dropdown">
                    <select class="form-control" name="changer_id">
                        @foreach($admins as $val)
                        <option value="{{ $val->admin_id }}">{{ $val->user_name }}</option>
                        @endforeach
                    </select>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection