@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>prefecture</h2>
                <div class="col-md-8" name="cities_id">
                    <a href="{{ action('Hikari\BlogController@city') }}">
                        @foreach($cities as $val)
                        <option value="{{ $val->city_id }}">{{ $val->city_name }}</option>
                        @endforeach
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection