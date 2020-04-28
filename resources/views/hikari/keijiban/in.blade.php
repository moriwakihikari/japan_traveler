@extends('layouts.front')

@section('title', '掲示板作成')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>掲示板の新規作成</h2>
            <form action="{{ action('Hikari\KeijibanController@toukou') }}" method="post" enctype="multipart/form-data">
                
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                <input name="thread_id" type="hidden" value"{{ $thread->id }}">
                <div class="form-group row">
                    <label class="col-md-2" for="toukou_title">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="toukou_title" value="{{ old('toukou_title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">本文</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="toukou_honbun" rows="20">{{ old('toukou_honbun') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="toukou_image">
                    </div>
                </div>
                <div>
                    <input type="hidden" name="author_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="changer_id" value="{{ Auth::id() }}">
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
        <div class="row">
            <h2>記事一覧</h2>
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
                            @foreach($posts as $toukou)
                                <tr>
                                    <th>{{ $toukou->toukou_id }}</th>
                                    <td>{{ \Str::limit($toukou->toukou_title, 100) }}</td>
                                    <td>{{ \Str::limit($toukou->toukou_honbun, 250) }}</td>
                                </tr>
                            @endforeach
                        </body>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection