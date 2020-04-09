@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <h2>全国一覧</h2>
            
            <br>
            
            @if (count($list) > 0)
            <br>
            {{ $list->links() }}
            <table class="table table-striped">
                <tr>
                    <th width="120px">カテゴリ番号</th>
                    <th>カテゴリ名</th>
                    <th width="60px">表示順</th>
                </tr>
                
                @foreach ($list as $prefecture)
                <tr data-prefecture_id="{{ $prefecture->prfecture_id }}">
                    <td>
                        <span class="prefecture_id">{{ $prefecture->prefeture_id }}</span>
                    </td>
                    <td>
                        <span class="prefecture_name">{{ $prefecture->prefecture_name }}</span>
                    </td>
                    <td>
                        <span class="display_order">{{ $prefecture->display_order }}</span>
                    </td>
                </tr>
                @endforeach
            </table>
            @else
            <br>
            <p>カテゴリがありません。</p>
            @endif
            </div>
        </div>
    </div>
@endsection