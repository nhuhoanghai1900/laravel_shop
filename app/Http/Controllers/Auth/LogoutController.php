<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Cookie::queue(Cookie::forget('laravel_session'));
        Cookie::queue(Cookie::forget('XSRF-TOKEN'));
        Cookie::queue(Cookie::forget(config('session.cookie')));

        return redirect()->route('home')->with('message', 'Đăng xuất thành công');
        ;
    }
}
