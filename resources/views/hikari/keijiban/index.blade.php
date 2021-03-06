@extends('layouts.front')

@section('title', 'Bulltin_Board')

@section('content')
    <div class="container">
        <div class="row">
            <h2>スレッド一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Hikari\KeijibanController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Hikari\KeijibanController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_thread_title" value="{{ $cond_thread_title }}">
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
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th width="50%">タイトル</th>
                                <th width="20%">入場</th>
                                <th width="30%">変更</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $thread)
                                <tr>
                                    <th>{{ \Str::limit($thread->thread_title, 100) }}</th>
                                    <th>
                                        <a class="card-link" href="{{ action('Hikari\KeijibanController@in', ['thread_id' => $thread->thread_id]) }}">詳細</a>
                                    </th>
                                    <th>
                                        <div>
                                            <a href="{{ action('Hikari\KeijibanController@edit', ['thread_id' => $thread->thread_id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Hikari\KeijibanController@delete', ['thread_id' => $thread->thread_id]) }}">削除</a>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection