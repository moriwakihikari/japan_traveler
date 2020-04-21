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
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="30%">ID</th>
                                <th width="70%">タイトル</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $thread)
                                <tr>
                                    <th>{{ $thread->id }}</th>
                                    <td>{{ \Str::limit($thread->thread_title, 100) }}</td>
                                    <tb>
                                        <div>
                                            <a href="{{ action('Hikari\KeijibanController@edit', ['id' => $thread->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Hikari\KeijibanController@delete', ['id' => $thread->id]) }}">削除</a>
                                        </div>
                                    </tb>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection