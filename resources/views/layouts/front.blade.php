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
                        <li><p class="text-sub">~自転車日本一周~<a class="text-sub" href="{{ action('Admin\Auth\LoginController@showLoginForm') }}">.</a></p></li>
                        
                        
                        <span id="view_clock"></span>
                        
                        <script type="text/javascript">
                            timerID = setInterval('clock()',500); //0.5秒毎にclock()を実行
                            
                            function clock() {
                                document.getElementById("view_clock").innerHTML = getNow();
                            }
                            function getNow() {
                                var now = new Date();
                                var year = now.getFullYear();
                                var mon = now.getMonth()+1; //１を足すこと
                                var day = now.getDate();
                                var you = now.getDay(); //曜日(0～6=日～土)
                                var hour = now.getHours();
                                var min = now.getMinutes();
                                var sec = now.getSeconds();
                                var youbi = new Array("日","月","火","水","木","金","土");
                                
                                var s = year + "年" + mon + "月" + day + "日(" + youbi[you] + ")" + hour + "時" + min + "分" + sec + "秒"; 
                                return s;
                                
                            }
                        </script>
                        
                    </ul>
                    <ul class="navbar-nav-right">
                        @guest
                        <li><a href="{{ route('login') }}"><input type="button" class"btn btn-primary" value="login"></a></li>
                        @else
                        <li class="nav-item dropdown">
                            <a user_id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->user_name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('logout')  }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout')  }}" method="POST" style="display; none;">
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
                           <!--{{-- <h2 class="panel-title">カテゴリー</h2>-->
                           <!-- <ul class="monthly_archive">-->
                           <!--     @forelse(isset($prefecture_list as $prefecture))-->
                           <!--     <li>-->
                           <!--         <a href="{{ route('blog_index', ['prefecture_id' => $prefecture->prefecture_id]) }}">-->
                           <!--         {{ $prefecture->name }}-->
                           <!--         </a>-->
                           <!--     </li>-->
                           <!--     @empty-->
                           <!--     <p>カテゴリーがありません</p>-->
                           <!--     @endforelse-->
                           <!-- </ul>--}}-->
                        <form action="{{ action('Hikari\BlogController@prefecture') }}" method="get" enctype="multipart/form-data">
                            <div clsss="dropdown">
                                <h2 class="text-title">検索</h2>
                                <select class="form-control" name="prefecture_id">
                                    @foreach($prefectures as $val)
                                    <option value="{{ $val->prefecture_id }}">{{ $val->prefecture_name }}</option>
                                    @endforeach
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary" value='送信'>
                                </select>
                            </div>
                        </form>
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