@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>prefecture</h2>
                <a href="{{ action('Hikari\BlogController@city') }}">市町村</a>
            </div>
        </div>
    </div>
@endsection