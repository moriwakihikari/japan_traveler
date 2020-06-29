@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <nav class="navbar navbar-dark bg-dark">
    　　　　　　　　　　　　　　<a href="#" class="navbar-brand">機能一覧</a>
  　　　　　　　　　　　　　　　　<button class="navbar-toggler" type="button"
      　　　　　　　　　　　　　　　　data-toggle="collapse"
      　　　　　　　　　　　　　　　　data-target="#navmenu1"
      　　　　　　　　　　　　　　　　aria-controls="navmenu1"
      　　　　　　　　　　　　　　　　aria-expanded="false"
      　　　　　　　　　　　　　　　　aria-label="Toggle navigation">
    　　　　　　　　　　　　　　　　　　<span class="navbar-toggler-icon"></span>
  　　　　　　　　　　　　　　　　</button>
  　　　　　　　　　　　　　　　　<div class="collapse navbar-collapse" id="navmenu1">
    　　　　　　　　　　　　　　　　　　<div class="navbar-nav">
      　　　　　　　　　　　　　　　　　　　　<a class="nav-item nav-link" href="blog/create">新規作成</a>
      　　　　　　　　　　　　　　　　　　　　<a class="nav-item nav-link" href="blog/list">記事一覧</a>
      　　　　　           　</div>
  　　　　　　　　　　　　　　　　</div>
  　　　　　　　　　　　　</nav>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
