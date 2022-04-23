<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>マイページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>マイページ</h1>
        <div>
            <a href="{{ route('user.edit', Auth::user()) }}">プロフィール編集</a>
        </div>
        <div>
            <a href="{{ route('mypage.index')}}">里親募集投稿一覧</a>
        </div>
    </body>
</html>
@endsection