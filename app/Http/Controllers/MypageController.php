<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class MypageController extends Controller
{
   public function index(User $user)
    {
    $posts = \Auth::user()->posts;
    return view('mypage.index')->with(['posts' => $posts]);//->with(['posts' => $user->getPaginateByLimit()]);

    }
    
    public function mypage(User $user, Post $post)
    {
    return view('mypage.mypage')->with(['user' => $user])->with(['post' => $post]);
    } 
}