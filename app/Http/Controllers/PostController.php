<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest; 
use App\Http\Requests\UpdateRequest;
use App\Sex;
use App\Breed;
use App\Area;
use App\Size;


class PostController extends Controller
{
    public function index(Post $post, Request $request)
    {
    return view('posts/index', ['posts' => $post->getPaginateByLimit()]);
    } 

    public function show(Post $post)
    {
    return view('posts/show')->with(['post' => $post]);
    
    
    }
    

    
    public function create(Post $post, Sex $sex, Breed $breed, Area $area, Size $size, Request $request)
    {
      return view('posts/create')->with(['sexes' => $sex->get()])->with(['breeds' => $breed->get()])->with(['areas' => $area->get()])->with(['sizes' => $size->get()])->with(['post' => $post->get()]);
      
    }
    
    public function store(Post $post,  PostRequest $request)
    {
      $post = new Post;
      $form = $request->all();
      
      //s3アップロード開始
      $image = $request->file('post.image_path');
      
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('test', $image, 'public');
      
      $input = $request['post'];
      $post->fill($input);
      // アップロードした画像のフルパスを取得
      $post->image_path = Storage::disk('s3')->url($path);
      
      $post->user_id = Auth::id();
      
      $post->save();
    
       //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト 
      return redirect('/posts/' . $post->id);
    }     
    
    public function edit(Post $post, Sex $sex, Breed $breed, Area $area, Size $size)
    {
      return view('posts/edit')->with(['post' => $post])->with(['sexes' => $sex->get()])->with(['breeds' => $breed->get()])->with(['areas' => $area->get()])->with(['sizes' => $size->get()]);
    }
    
    public function update(Post $post, UpdateRequest $request)
    {
      $old_image_path = ($post->image_path);
      //$post = new Post;
      $input = $request['post'];
      $post->fill($input);
      $post->user_id = Auth::id();
  
      $check = array_key_exists("image_path", $input);
      $check_vaccine = array_key_exists("vaccine", $input);
      $check_fix = array_key_exists("fix", $input);
      $old_vaccine = ($post->vaccine);
      $old_fix = ($post->fix);
      
      if($old_vaccine === $check_vaccine){
      $post->vaccine = $old_vaccine;
      }else{
      $post->vaccine = $check_vaccine;
      }
      
      if($old_fix === $check_fix){
      $post->fix = $old_fix;
      }else{
      $post->fix = $check_fix;
      }
      
      if($check === true){
     
      $image = $request->file('post.image_path');
      
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('test', $image, 'public');
      
      // アップロードした画像のフルパスを取得
      $post->image_path = Storage::disk('s3')->url($path);
        
      }else{
        
      $post->image_path = $old_image_path;
      
      }
      $post->save();
      
      
      
      return redirect('/mypage/' . $post->id);
    }
    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/mypage');
   }
  
}    