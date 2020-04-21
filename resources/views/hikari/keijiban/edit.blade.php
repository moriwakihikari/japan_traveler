@extends('layouts.hikari')

@section('title', '編集')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>スレッド編集</h2>
            <form action="{{ action('Hikari\KeijibanController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2" for="blog_title">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="thread_title" value="{{ $thread_form->thread_title }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ $thread_form->id }}">
                        {{csrf_field() }}
                        <input type="submit" class="btn-primary" value="更新">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection