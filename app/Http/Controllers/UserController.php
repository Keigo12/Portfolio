<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    return view('user.index');
    }
    
    public function edit($id)
    {
    return view('user.edit');
    }
    
    public function update(UserRequest $request, User $user)
{
    $user->fill($request->all());

    // パスワードの項目があるとき（つまり、パスワードを変更するとき）
    if (!is_null($request->password)) {
        // パスワードの値をハッシュ化して上書きする。
        $user->password = Hash::make($request->password);
    } else {
        // パスワードの項目に値がないときは、アップデートの対象にしない。
        unset($user->password);
    }
    $user->save();
    return redirect(route('user.index'));
}
}
