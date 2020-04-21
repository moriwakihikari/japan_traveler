@extends('layouts.hikari')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>スレッド作成</h2>
                <form action="{{ action('Hikari\KeijibanController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="thread_title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="thread_title" value="{{ old('thread_title') }}">
                        </div>
                    </div>
                    <div class="dropdown">
                    <select class="form-control" name="author_id">
                        @foreach($users as $val)
                        <option value="{{ $val->user_id }}">{{ $val->user_name }}</option>
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