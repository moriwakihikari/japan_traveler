@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>City</h2>
                <form action="{{ action('Hikari\BlogController@prefecture') }}" method="get">
                <input type="hidden" name="prefecture_id" value="{{ $cond_prefecture_id }}">
                    <div class="col-md-8" name="cities_id">
                        @foreach($prefecture_id as $val)
                            <a href="{{ action('Hikari\BlogController@prefecture', ['city_id' => $val->city_id]) }}">
                            <option value="{{ $val->city_id }}">{{ $val->city_name }}</option>
                            </a>
                        @endforeach
                        <div class="return"><input type="button"class="btn btn-primary" onclick="history.back()" value="戻る"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection