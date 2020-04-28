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
        <!-- フォント -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <!-- css読み込み-->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <header>
            <div user_id="app">
                <div class="container">
                    <ul class="header-title-area">
                        <li><h1 class="logo">日本の名所</h1></li>
                        <li><p class="text-sub">~自転車日本一周~</p></li>
                    </ul>
                    <ul class="navbar-nav-right">
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('login')  }}</a></li>
                        @else
                        <li class="nav-item dropdown">
                            <a user_id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('logout')  }}
                                </a>
                                
                                <form user_id="logout-form" action="{{ route('logout')  }}" method="POST" style="display; none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                        
                    <ul class="header-navigation">
                        <li><a href="{{ action('Hikari\HomeController@index') }}">Home</a></li>
                        <li><a href="{{ action('Hikari\BlogController@index') }}">Prefecture</a></li>
                        <li><a href="{{ action('Hikari\RondomController@index') }}">Rondom</a></li>
                        <li><a href="{{ action('Hikari\KeijibanController@index') }}">Bulltin_Board</a></li>
                    </ul>
                </div>
        </header>
            
            <div class="main">
                <div class="container">
                    <div class="left-contents">
                        <div class="card-contents">
                            @yield('content')
                        </div>
                    </div>
                    <div class="right-contents">
                        <div class="card-contents">
                           {{-- <h2 class="panel-title">カテゴリー</h2>
                            <ul class="monthly_archive">
                                @forelse(isset($prefecture_list as $prefecture))
                                <li>
                                    <a href="{{ route('blog_index', ['prefecture_id' => $prefecture->prefecture_id]) }}">
                                    {{ $prefecture->name }}
                                    </a>
                                </li>
                                @empty
                                <p>カテゴリーがありません</p>
                                @endforelse
                            </ul>--}}
                            <div clsss="dropdown">
                                <h2 class="text-title">検索</h2>
                                <select class="form-control" name="prefecture">
                                    @foreach($prefectures as $val)
                                    <option value="{{ $val->prefecture_id }}">{{ $val->prefecture_name }}</option>
                                    @endforeach
                                    <input type="button" class="btn btn-primary" value='送信' />
                                </select>
                            </div>
                            <h2 class="text-title">youtube</h2>
                            <iframe width="100" height="100" src="https://www.youtube.com/embed/lHIYBDbQmj8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <p class="copyright">(C) 日本の名所</p>
            </footer>
            </div>
    </body>
</html>