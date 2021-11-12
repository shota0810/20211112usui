@extends('layouts.default')

<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@section('content')

<!-- create -->
@error('content')
    <p>{{$message}}</p>
@enderror
<form class="create" action="/todo/create" method="POST">
    @csrf
    <input class="input-create" type="text" name="content">
    <input class="button-create" type="submit" value="追加">
</form>
<!-- update/delete -->
<table>
    <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>
        {{$item->created_at}}
        </td>
        <form class="update" action="/todo/update" method="POST">
        @csrf
            <!-- ユーザーには見えないが、該当するレコードをIDで判断させるためhiddnで記述 -->
            <input type="hidden" name="id" value="{{$item->id}}">
            <td>
                <input input class="input-update" type="text" name="content" value="{{$item->content}}">
            </td>
            <td>
                <button class="button-update" type="submit">更新</button>
            </td>
        </form>
        <td>
            <form class="update" action="/todo/delete" method="POST">
            @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <button class="button-delete" type="submit">削除</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection