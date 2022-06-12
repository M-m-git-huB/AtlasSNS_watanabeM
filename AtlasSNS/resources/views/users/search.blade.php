@extends('layouts.login')

@section('content')
<div class="container">
    
    {{-- ↓検索フォーム↓ --}}
    {{-- <form class="form-inline my-2 my-lg-0 ml-2">
        <div class="form-group">
        <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('searchh')}}" placeholder="ユーザー名" aria-label="検索...">
        </div>
        <input type="submit" value="検索" class="btn btn-info">
    </form> --}}
    <form action="{{url('/search-result')}}" method="GET">
        {{--検索バーの中にキーワードが入っていたら処理を実行する--}}
        <p><input type="text" name="keyword" value=""></p>
        <p><input type="submit" value="検索"></p>
    </form>
    {{-- ↑検索フォーム↑ --}}



    {{-- {!! Form::open(['url' => '/top']) !!}
    <div class="form-group">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">検索</button>
    {!! Form::close() !!} --}}

    <div>
        @foreach($users as $user)
            <br>
            <p>{{$user->username}}</p>
        @endforeach
    </div>
</div>
@endsection