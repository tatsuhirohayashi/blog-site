<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // ユーザー情報の登録
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/login');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // 認証情報の取得
        $credentials = $request->only('email', 'password');

        // 認証試行
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // セッションの再生成
            return redirect()->intended('/'); // ログイン後のリダイレクト先
        }

        // 認証失敗時
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout(); // ユーザーのログアウト

        $request->session()->invalidate(); // セッションの無効化
        $request->session()->regenerateToken(); // CSRFトークンの再生成

        return redirect('/login'); // ログアウト後のリダイレクト先
    }
}
