<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ユーザー登録</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ユーザー情報確認</h1>
        <div class='users'>
             
                <div class='infomation'>
                    <p style="display:none">{{$post_user_id}}</p>
                    <p class='user_name'>お名前:{{ $user->name }}</p>
                    <p class='email'>メールアドレス:{{ $user->email }}</p>
                    <p class='sex'>性別:{{ $sex->sex }}</p>
                    <a class='area'>地域:{{ $area->area }}</p>
                    <a class='job'>職業:{{ $job->job }}</p>
                    <a>※上記の内容が掲載者にメールで送信されます。</a>
        <div class="update">
            <a href="/mail/entry_mail/{{$post_user_id}}">応募を確定する</a>
        </div>
        
    </body>
</html>
@endsection