@extends('layouts.front')

@section('title', 'Rondom')

@section('content')

    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>ダーツの旅的な</h2>
                <p>今回の都道府県は「{{ $fortune }}」です。</p>
                <div class="return"><input type="button"class="btn btn-primary" onclick="history.back()" value="戻る"></div>
            </div>
        </div>
    </div>
@endsection