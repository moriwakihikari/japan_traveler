@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <!--インジケータの設定 -->
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <!--スライドさせる画像の設定 -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ secure_asset('image/hokkaidou.jpeg') }}">
                        </div><!-- /.carousel-item -->
                        <div class="carousel-item">
                            <img src="{{ secure_asset('image/hokkaidou.jpeg') }}">
                        </div><!-- /.carousel-item -->
                        <div class="carousel-item">
                            <img src="{{ secure_asset('image/hokkaidou.jpeg') }}">
                        </div><!-- /.carousel-item -->
                    </div><!-- /.carousel-inner -->
                    <!--スライドコントロールの設定 -->
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"></a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"></a>
                </div>
               
                <h2>Home</h2>
                <h3>こちらのサイトは筆者が実際に行った場所のまとめサイトであり、それをおすすめするサイトであります。あなたの旅の参考になれば幸いです。</h3>
            </div>
        </div>
    </div>
@endsection