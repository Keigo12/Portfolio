<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title></title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="image">画像ファイル:</label>
             <input type="file"  name="post[image_path]" />
             <p class="image__error" style="color:red">{{ $errors->first('post.image_path') }}</p>
            
            <div class="name">
                <label for="name">名前</label>
                <input type="text" name="post[name]" placeholder="名前/メーセージを入力" value="{{ old('post.name')}}"/>
                <p class="name__error" style="color:red">{{ $errors->first('post.name') }}</p>
            </div>
            <div>
                <label for="vaccine">ワクチン接種済み</label>
                <input type="checkbox" name="post[vaccine]"  value="1" {{ old('post.vaccine') == '1' ? 'checked' : '' }}/>
            </div>
            
            
            
            <div>
                <label for="fix">去勢済み</label>
                <input type="checkbox" name="post[fix]" value="1" {{ old('post.fix') == '1' ? 'checked' : '' }}> 
            </div>
            <div class="infomation">
                <div class="sex">
                    <label for="sex">性別</label>
                    <select name="post[sex_id]">
                        <option value="">選択してください</option>
                        @foreach($sexes as $sex)
                            <option value="{{ $sex->id }}" @if(old('post.sex_id')==$sex->id) selected @endif>{{ $sex->sex }}</option>
                        @endforeach
                    </select>
                    <p class="sex_id__error" style="color:red">{{ $errors->first('post.sex_id') }}</p>
                </div>
                <div class="breed">
                    <label for="breed">犬種</label>
                    <select name="post[breed_id]">
                        <option value="">選択してください</option>    
                        @foreach($breeds as $breed)
                            <option value="{{ $breed->id }}" @if(old('post.breed_id')== $breed->id) selected @endif>{{ $breed->breed }}</option>
                        @endforeach
                    </select>
                    <p class="breed_id__error" style="color:red">{{ $errors->first('post.breed_id') }}</p>
                </div>
                <div class="area">
                    <label for="area">地域</label>
                    <select name="post[area_id]">
                        <option value="">選択してください</option>   
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" @if(old('post.area_id')== $area->id) selected @endif>{{ $area->area }}</option>
                        @endforeach
                    </select>
                    <p class="area_id__error" style="color:red">{{ $errors->first('post.area_id') }}</p>
                </div>
                <div class="size">
                    <label for="size">サイズ</label>
                    <select name="post[size_id]">
                        <option value="">選択してください</option>    
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}" @if(old('post.size_id')== $size->id) selected @endif>{{ $size->size }}</option>
                        @endforeach
                    </select>
                    <p class="size_id__error" style="color:red">{{ $errors->first('post.size_id') }}</p>
                </div>
                
                <div>
                    <label for="age">年齢</label>
                    <input type="text" name="post[age]" value="{{ old('post.age')}}"/>
                    <p class="age__error" style="color:red">{{ $errors->first('post.age') }}</p>
                </div> 
                <div>
                    <label for="backgrooud">募集経緯</label>
                    <textarea name="post[backgrooud]" placeholder="里親を募集することになった経緯を入力">{{ old('post.backgrooud') }}</textarea>
                    <p class="backgrooud__error" style="color:red">{{ $errors->first('post.backgrooud') }}</p>
                </div>
                <div>
                    <label for="personality">性格・特徴</label>
                    <textarea name="post[personality]" placeholder="性格や特徴を入力">{{ old('post.personality') }}</textarea>
                    <p class="personality__error" style="color:red">{{ $errors->first('post.personality') }}</p>
                </div>
                <div>
                    <label for="condition">引き渡し条件</label>
                    <textarea name="post[condition]" placeholder="引き渡しの条件を入力">{{ old('post.condition') }}</textarea>
                    <p class="condition__error" style="color:red">{{ $errors->first('post.condition') }}</p>
                </div>
                <div>
                    <label for="adopt">引き渡し方法</label>
                    <textarea name="post[adopt]" placeholder="引き渡し方法入力">{{ old('post.adopt') }}</textarea>
                    <p class="adopt__error" style="color:red">{{ $errors->first('post.adopt') }}</p>
                </div>
                <div>
                    <label for='period'>締切日</label>
                    <input type="date" name="post[period]" placeholder="2025/01/01" value="{{ old('post.period')}}">
                    <p class="period__error" style="color:red">{{ $errors->first('post.period') }}</p>
                </div>
            </div>
            
            
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">戻る</a>]</div>
    </body>
</html>
@endsection