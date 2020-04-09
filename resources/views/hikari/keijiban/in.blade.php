@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>掲示板の新規作成</h2>
            <form action="{{ action('Hikari\KeijibanController@in') }}" method="post" enctype="multipart/form-data">
                
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="toukou_title" value="{{ old('toukou_title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">本文</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="toukou_honbun" rows="20">{{ old('toukou_body') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="toukou_image">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection