@extends('layouts.front')

@section('title', '都道府県一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>地域ブロック</h2>
                <form action="{{ action('Hikari\BlogController@index') }}" method="get">
                    <div class="col-md-2">
                        <div clsss="col-md-8" name="area_id">
                            @foreach($areaInfo as $val)
                            <option value = "{{ $val->area_id }}"> {{ $val->area_name }}</option>
                            <?php
                            $prefectureList2 = array();
                            $prefectureList2 = $prefecturesList[ $val->area_id ];
                            foreach($prefectureList2 as $a){
                            echo"<a href="."prefecture?prefecture_id=$a->prefecture_id".">$a->prefecture_name<br></a>";
                            }
                            ?>
                            <br>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection