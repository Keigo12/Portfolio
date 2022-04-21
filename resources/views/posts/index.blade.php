<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>里親募集一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>里親募集一覧</h1>
        <div class='posts'>
             @foreach ($posts as $post)
                <div class='post'>
                    
                    <img src="{{ $post->image_path }}">
                    
	                        
	                    <h2 class='name'>
                            <a href="/posts/{{ $post->id }}">{{ $post->name }}</a>
                        </h2>
                    </div>
                    <div class='infomation'>
                        <p class='sex'>性別:{{ $post->sex->sex }}</p>
                        <p class='age'>年齢:{{ $post->age }}</p>
                        <p class='breed'>犬種:{{ $post->breed->breed }}</p>
                        <p class='area'>地域:{{ $post->area->area }}</p>
                        <a class='period'>締切日:{{ $post->period }}</p>
                    </div>
                        <p class='id'>募集番号:{{ $post->id }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection