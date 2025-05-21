<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email:rfc,dns'],
                'password' => ['required', 'string', Password::min(6)],
            ]);
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tài khoản hoặc mật khẩu không đúng'
                ], 401);
            }
            $user = Auth::user();
            $redirectRoute = $user->role === 'admin' ? 'admin/orders' : '/';
            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập tài khoản thành công',
                'redirectRoute' => $redirectRoute,
                'user' => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email]
            ]);
        }
        // check lỗi validate
        catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ',
                'errors' => $e->errors(),
            ], 422);
        }
        // check lỗi server
        catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
