@extends('layouts.front')

@section('title', '市町村一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>市町村</h2>
                <form action="{{ action('Hikari\BlogController@prefecture') }}" method="get">
                <input type="hidden" name="prefecture_id" value="{{ $cond_prefecture_id }}">
                    <div class="col-md-8" name="cities_id">
                        @if(count($prefecture_id) > 0)
                        @foreach($prefecture_id as $val)
                            <a href="{{ action('Hikari\BlogController@city', ['city_id' => $val->city_id]) }}">
                            <option value="{{ $val->city_id }}">{{ $val->city_name }}</option>
                            </a>
                        @endforeach
                        @else
                            <p class="text-center">市町村が存在しません</p>
                        @endif
                        <div class="return"><input type="button"class="btn btn-primary" onclick="history.back()" value="戻る"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection