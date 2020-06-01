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
                <label class="col-md-2">
                    <div class="col-md-8">
                        <input type="hidden" name="thread_id" value="{{ $cond_thread_id }}">
                    </div>
                </label>
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
            <h2>投稿</h2>
        </div>
    <hr color="#c0c0c0">
        <div class="row">
            <input type="hidden" name="thread_id" value="{{ $cond_thread_id }}">
            <div class="blogs col-md-8 mx-auto mt-3">
                @foreach ($posts as $toukou)
                <div class="post">
                    <div class="row">
                        <div class="text col-md-6">
                            <div class="toukou_title">
                                {{ str_limit($toukou->toukou_title, 150) }}
                            </div>
                            <div class="toukou_honbun mt-3">
                                {{ str_limit($toukou->toukou_honbun, 500) }}
                            </div>
                        </div>
                        <div class="toukou_image col-md-6 text-right mx-4">
                            @if ($toukou->toukou_image)
                            <img src="{{ secure_asset('storage/image/' .$toukou->toukou_image) }}">
                            @endif
                        </div>
                    </div>
                </div>
                <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    <div class="row">
        <div class="list-news col-md-12 mx-auto">
            <div class="row">
                <input type="hidden" name="thread_id" value="{{ $cond_thread_id }}">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="30%">タイトル</th>
                            <th width="50%">本文</th>
                            <th width="20%">操作</th>
                        </tr>
                    </thead>
                    <body>
                        @foreach($posts as $toukou)
                        <tr>
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