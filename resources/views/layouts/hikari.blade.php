<!DOCTYPE html>
<html lang="{{app()->getLocale() }}">
    <head>
        <meta chareset="utf-8">
        <!-- windows edge対応 -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- 画面文字調整 -->
        <meta name="viewport" content="width=device-width, initial-scale=!">
        <!-- トークン -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- タイトル -->
        <title>@yield('title')</title>
        <!-- js -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <!-- css読み込み-->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/hikari.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div id="app">
            <!-- ナビバー -->
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Home') }}
                    </a>
                    <button class="navbar-toggler" type="button" deta-toggle="collapse" date-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        
                        <ul class="navbar-nav ml-auto">
                            
                        </ul>
                    </div>
                </div>
            </nav>
            
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>