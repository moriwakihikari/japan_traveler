@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>地域ブロック</h2>
                <form action="{{ action('Hikari\BlogController@index') }}" method="get">
                    <div class="col-md-2">
                        <div clsss="col-md-8" name="area_id">
                            @foreach($prefectures as $val)
                            {{$val[1]}}
                            <br>
                            @endforeach
                            <a href="{{ action('Hikari\BlogController@prefecture') }}">都道府県</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection