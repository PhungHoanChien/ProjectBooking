<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginResquest;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Session\Middleware\AuthenticateSession;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(LoginResquest $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials) && Auth::user()->role === 'user') {
        $request->session()->regenerate();

        return redirect()->intended('/');
    }elseif (Auth::attempt($credentials) && Auth::user()->role === 'admin') {
        $request->session()->regenerate();

        return redirect()->intended('/admin/dashboard');
    }

    return back()->withErrors([
        'email' => 'Đăng nhập không thành công',
    ]);
}
    public function showRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image_user' => 'default.png',
            'role' => 'user',
        ]);

        return redirect('/login')->with('success', 'Đăng ký thành công');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Đăng xuất thành công');
    }
}
