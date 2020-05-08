@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>地域ブロック</h2>
                <form action="{{ action('Hikari\BlogController@index') }}" method="get">
                    <div class="col-md-2">
                        <div class="col-md-8" name="area_id">
                            @foreach($areaInfo as $val)
                            <option value="{{ $val->area_id }}">{{ $val->area_name }}</option>
                            <div clsss="col-md-8" name="prefecturesList">
                                @foreach($prefecturesList as $prefecture)
                                    <div clsss="col-md-8" name="prefecture_id">
                                    @foreach($prefecture as $val)
                                        <a href="{{ action('Hikari\BlogController@prefecture') }}">
                                        <option value="{{ $val->prefecture_id }}">{{ $val->prefecture_name }}</option>
                                        </a>
                                    @endforeach
                                    </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection