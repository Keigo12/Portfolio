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
        <h1>Blog Name</h1>
        <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            
            <img src="{{ $post->image_path }}">
            <label for="image">画像ファイル:</label>
            <label style="background-color:red">画像選択してください。<input type="file"  name="post[image_path]" style="display:none"></label>
             
             
          
             
            
            <div class="name">
                <label for="name">名前</label>
                <input type="text" name="post[name]" value="{{ $post->name }}"/>
            </div>
            <div class="infomation">
                <div>
                    <label for="vaccine">ワクチン接種済み</label>
                    <input type="checkbox" name="post[vaccine]" value="1" {{ old('post[vaccine]',$post->vaccine) == '1' ? 'checked' : '' }}> 
                </div>
                 <div>
                    <label for="vaccine">去勢済み</label>
                    <input type="checkbox" name="post[fix]" value="1" {{ old('post[fix]',$post->fix) == '1' ? 'checked' : '' }}> 
                </div>
                <div class="sex">
                    <label for="sex">性別</label>
                    <select name="post[sex_id]">
                    <option value="">選択してください</option>
                        @foreach ($sexes as $sex)
                            @if($sex->id === $post->sex_id)
                                <option value="{{ $sex->id }}" selected>{{ $sex->sex }}</option>
                            @else
                                <option value="{{ $sex->id }}">{{ $sex->sex }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>       
                <div class="breed">
                    <label for="breed">犬種</label>
                    <select name="post[breed_id]">
                    <option value="">選択してください</option>
                        @foreach ($breeds as $breed)
                            @if($breed->id === $post->breed_id)
                                <option value="{{ $breed->id }}" selected>{{ $breed->breed }}</option>
                            @else
                                <option value="{{ $breed->id }}">{{ $breed->breed }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>   
                <div class="area">
                    <label for="area">地域</label>
                    <select name="post[area_id]">
                    <option value="">選択してください</option>
                        @foreach ($areas as $area)
                            @if($area->id === $post->area_id)
                                <option value="{{ $area->id }}" selected>{{ $area->area }}</option>
                            @else
                                <option value="{{ $area->id }}">{{ $area->area }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>               
                <div class="size">
                    <label for="size">サイズ</label>
                    <select name="post[size_id]">
                    <option value="">選択してください</option>
                        @foreach ($sizes as $size)
                            @if($size->id === $post->size_id)
                                <option value="{{ $size->id }}" selected>{{ $size->size }}</option>
                            @else
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>              
                <div>
                    <label for="age">年齢</label>
                    <input type="text" name="post[age]" value="{{ $post->age }}"/>
                </div> 
                <div>
                    <label for="backgrooud">募集経緯</label>
                    <textarea name="post[backgrooud]" placeholder="里親を募集することになった経緯を入力">{{ $post->backgrooud }}</textarea>
                </div>
                <div>
                    <label for="personality">性格・特徴</label>
                    <textarea name="post[personality]" placeholder="性格や特徴を入力">{{ $post->personality }}</textarea>
                </div>
                <div>
                    <label for="condition">引き渡し条件</label>
                    <textarea name="post[condition]" placeholder="引き渡しの条件を入力">{{ $post->condition }}</textarea>
                </div>
                <div>
                    <label for="adopt">引き渡し方法</label>
                    <textarea name="post[adopt]" placeholder="引き渡し方法入力">{{ $post->adopt}}</textarea>
                </div>
                <div>
                    <label for='period'>締切日</label>
                    <input type="date" name="post[period]" value={{ $post->period}}>
                </div>
            </div>
            <input type="submit" value="更新"/>
        </form>
        <div class="back">[<a href="/posts/{{ $post->id }}">戻る</a>]</div>
    </body>
</html>
@endsection