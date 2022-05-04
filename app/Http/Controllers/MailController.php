<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Area;
use App\Job;
use App\Sex;
use App\Mail\EntryMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
       public function index($id)
        {
        $auth_user=\Auth::user();
        $area_name=Area::find($auth_user->area_id);
        $job_name=Job::find($auth_user->job_id);
        $sex_name=Sex::find($auth_user->sex_id);
        
        return view('mail.index')->with(['user' => $auth_user,"area" => $area_name,"job" => $job_name,"sex" => $sex_name, "post_user_id" => $id]);
        }
        
        // 送信ボタン押下時に呼ばれる
    public function entry($id)
    {
        //dd(User::find($id));
        
       $auth_user=[\Auth::user()];
       $user_email = User::find($id);

        Mail::send('mail.entry_mail', $auth_user, function($message){
            $message->to('t8827277@gmail.com')
    	    ->subject('This is a test mail');
        });
      
        return view('mail.entry_complete');
    }
    
    
}