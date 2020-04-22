@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>地域ブロック</h2>
                <form action="{{ action('Hikari\BlogController@index') }}" method="get">
                    <div class="col-md-2">
                        <lable clsss="col-md-8" name="area">
                            @foreach($areas as $val)
                            <option value="{{ $val->area_id }}">{{ $val->area_name }}</option>
                            @endforeach
                        </lable>
                        <lable clsss="col-md-8" name="prefecture">
                            @foreach($prefectures as $val)
                            <option value="{{ $val->prefecture_id }}">{{ $val->prefecture_name }}</option>
                            @endforeach
                        </lable>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection