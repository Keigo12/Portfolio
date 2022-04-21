<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Area;
use App\Job;
use App\Sex;

class UserController extends Controller
{
    public function index(User $user)
    {
        $auth_user=\Auth::user();
        $area_name=Area::find($auth_user->area_id);
        $job_name=Job::find($auth_user->job_id);
        $sex_name=Sex::find($auth_user->sex_id);
        
    return view('user.index')->with(['user' => $auth_user,"area" => $area_name])->with(['user' => $auth_user,"job" => $job_name])->with(['user' => $auth_user,"sex" => $sex_name]);
    }
    
    public function edit($id)
    {
    return view('user.edit');
    }
    
    public function update(Request $request, User $user)
    {
    $user->fill($request["user"]);
    $user->save();
    return redirect(route('user.index'));
    }
}
