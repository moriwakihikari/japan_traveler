@extends('layouts.front')

@section('title', 'Rondom')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>ダーツの旅的な</h2>
                <h3>４７都道府県をランダムで表示します。<br>
                どこに行こうか迷ったり、罰ゲームで使ったりいろんなことに使ってください。<br>
                それでは下のボタンを押してください。
                </h3>
                <div class="result"><input type="button" class="btn btn-primary" onclick="location.href='rondom/result'" value="結果"></div>
            </div>
        </div>
    </div>
@endsection 