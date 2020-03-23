@extends('layouts.front')

@section('title', 'Rondom')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>ダーツの旅的な</h2>
                <p>今回の都道府県は「<?php
                    $fortune = array(
                    "北海道",
                    "青森",
                    "岩手",
                    "秋田",
                    "宮城",
                    "山形",
                    "福島",
                    "茨城",
                    "千葉",
                    "栃木",
                    "群馬",
                    "東京",
                    "神奈川",
                    "山梨",
                    "新潟",
                    "長野"
                    );
                    $count  = count($fortune);
                    $random = rand(0, $count - 1);
                    echo $fortune[$random];
                    ?>」です。
                </p>
                    <div class="return"><input type="button" onclick="history.back()" value="戻る"></div>

            </div>
        </div>
    </div>
@endsection