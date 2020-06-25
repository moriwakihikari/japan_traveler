@extends('layouts.hikari')

@section('title', '編集')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>ブログ編集</h2>
            <form id="select_prefecture_city" action="{{ action('Hikari\BlogController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                    {{ csrf_field() }}
                <div>
                    <p>都道府県選択</p>
                    <select id="select_prefecture" class="form-control" name="prefecture_id">
                        <option value="">--選択してください--</option>
                        @foreach($prefectures as $val)
                        <option value="{{ $val->prefecture_id }}">{{ $val->prefecture_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <p>市選択</p>
                    <select id="selected_city" class="form-control" name="city_id">
                        <option value="">--選択してください--</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="blog_title">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="blog_title" value="{{ $blog_form->blog_title }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="blog_honbun">本文</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="blog_honbun" rows="20">{{ $blog_form->blog_honbun }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="blog_image">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="blog_image">
                        <div class="form-text text-info">
                            設定中: {{ $blog_form->image_path }}
                        </div>
                        <div class="form-check">
                            <label class="form-cheak-label">
                                <input type="checkbox" class="form-cheak-unput" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="hidden" name="author_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="changer_id" value="{{ Auth::id() }}">
                    <!--<input type="hidden" name="prefecture_id" value="{{ $prefectures->prefecture_id }}">-->
                    <!--<input type="hidden" name="city_id" value="{{ $cities->city_id }}">-->
                </div>
                <div class="form-group row">
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ $blog_form->blog_id }}">
                        {{csrf_field() }}
                        <input type="submit" class="btn-primary" value="更新">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection