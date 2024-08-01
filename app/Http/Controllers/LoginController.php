<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }
    public function postLogin(Request $request)
    {
        $data = $request->only(['username', 'password']);
        if (Auth::attempt($data)) {
            return redirect()->route('user.infor')->with('message', 'Đăng nhập thành công ');
        } else {
            return redirect()->back()->with('error', 'Username hoặc Password không chính xác');
        }
    }
    public function register()
    {
        return view('register');
    }
    public function postRegister(Request $request)
    {
        $data = $request->except('avatar');
        $data['avatar'] = '';
        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('images');
            $data['avatar'] = $avatar_path;
        }
        // dd($data);
        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Đăng ký thành công');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function list()
    {
        $users = User::all();
        return view('login.list', compact('users'));
    }
    public function infor()
    {
        return view('login.infor');
    }
    public function update(Request $request, User $user)
    {
        $data = $request->except('avatar');
        $old_avatar = $user->avatar;
        $data['avatar'] = $old_avatar;
        // dd($request);
        if ($request->hasFile('avatar')) {
            $path_avatar = $request->file('avatar')->store('images');
            $data['avatar'] = $path_avatar;
        }
        // dd($data);
        // User::where('id', '=', Auth::user()->id)->update($data);
        $user->update($data);
        // if (isset($path_avatar)) {
        //     if (file_exists('storage/' . $old_avatar)) {
        //         unlink('storage/' . $old_avatar);
        //     }
        // }
        return redirect()->route('user.infor')->with('message', 'Sửa thành công');
    }
    public function adminEdit(User $user)
    {
        return view('login.edit', compact('user'));
    }
    public function adminUpdate(User $user, Request $request)
    {
        $data = $request->except(['avatar', '_token','_method']);
        $old_avatar = $user->avatar;
        $data['avatar'] = $old_avatar;
        if ($request->hasFile('avatar')) {
            $path_avatar = $request->file('avatar')->store('images');
            $data['avatar'] = $path_avatar;
        }
        // $user->update($data);
        User::where('id', '=', $user->id)->update($data);
        return redirect()->route('user.list');
    }
}
