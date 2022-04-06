<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
        <h1>投稿詳細画面</h1>
                <div class='post'>
                    <p class='id'>募集番号:{{ $post->id }}</p>
                    <p class='period'>掲載期限:{{ $post->period }}</p>
                    
	                        
	                         <img src="{{ $post->image_path }}">
	                       
                            <h2 class='name'>{{ $post->name }}</h2>
                        
                    </div>
                    <div class='infomation'>
                        <p class='period'>締切日{{ $post->period}}</p>
                        <p class='sex'>性別:{{ $post->sex->sex }}</p>
                        <p class='age'>{{ $post->age }}</p>
                        <p class='breed'>犬種:{{ $post->breed->breed }}</p>
                        <p class='area'>地域:{{ $post->area->area }}</p>
                        <p class='size'>サイズ:{{ $post->size->size }}</p>
                        <p>去勢：
                        @if ($post['fix'] === 0)
	                    未                    
                        @else
                        済
                        @endif
                        </p>
                        <p>ワクチン：
                        @if ($post['vaccine'] === 0)
	                    未                    
                        @else
                        済
                        @endif
                        </p>
                        <p class='backgrooud'>募集経緯:{{ $post->backgrooud }}</p>
                        <p class='personality'>性格:{{ $post->personality }}</p>
                        <p class='condition'>引き渡し条件:{{ $post->condition }}</p>
                        <p class='adopt'></p>引き渡し方法:{{ $post->adopt}}</p>
                    </div>
                    <div class='date'>
                        <p class='create_at'>作成日:{{ $post->created_at }}</p>
                        <p class='updated_at'>更新日:{{ $post->updated_at }}</p>
                    </div>
                    <div class='user'>
                        <p class='user_name'>ユーザー名　{{ $post->user->name}}</p>
                        <p class='user_id'>ユーザーID　{{ $post->user->id}}</p>
                    </div>
                </div>
                <div class="footer">
                    <a href="/">戻る</a>
                </div>
    </body>
</html>
  @endsection  