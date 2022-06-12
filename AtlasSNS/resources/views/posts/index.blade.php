@extends('layouts.login')

@section('content')
<div class="container">

    {!! Form::open(['url' => '/top']) !!}
    <div class="form-group">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">投稿</button>
    {!! Form::close() !!}

    <div>
        <br>
        <h2 class="page-header">＜一覧表示しとく＞</h2>
        <br>
        <br>
            @foreach($posts as $post)
                                                {{-- <div>
                                                <!-- オーバーレイ -->
                                                <div id="overlay" class="overlay"></div>
                                                <!-- モーダルウィンドウ -->
                                                <div class="modal-window">
                                                <!-- 閉じるボタン -->
                                                <button class="js-close button-close">閉じる</button>
                                                </div> --}}
            <!-- ↓モーダルの中身 -->
                <div id="overlay" class="overlay"></div>
                    <div class="modal-window">
                        <div class="modal__bg js-modal-close"></div>
                        <div class="modal__content">
                            {!! Form::open(['url' => '/post/update']) !!}
                            <div class="form-group">
                                {!! Form::hidden('id', $post->id) !!}
                                {{-- ↑ユーザーは知る必要がないけど、サーバーには送りたい情報を格納する時にするコード--}}
                                {!! Form::input('text', 'upPost', $post->post, ['required', 'class' => 'form-control']) !!}
                                {{--↑入力された情報は、データとしてサーバに送信される--}}
                            </div>                                
                            <input type="submit" value="更新">
                            {!! Form::close() !!}
                            <button class="js-close button-close">閉じる</button>
                        </div>
                    </div>
            <!-- ↑モーダルの中身 -->
                    <p>{{$post->post}}</p>
                    <br>
                    <p>{{$post->created_at}}</p>
                    <br>
                    <td><a class="js-open button-open" post="{{$post->post}}" post_id="{{$post->id}}">更新</a></td>
                    <br>
                    <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
                    <br>
                    <br>
            @endforeach
    </div>
</div>


@endsection