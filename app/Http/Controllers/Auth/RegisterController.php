<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[\pl\s\-]+$/u',
                    function ($attribute, $value, $fail) {
                        if (preg_match_all('/\p{L}+/u', $value, $matches) < 2) {
                            $fail('Họ tên phải gồm ít nhất 2 từ.');
                        }
                    }
                ],
                'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
                'password' => ['required', Password::min(6), 'confirmed'],
            ]);
            $validated['password'] = Hash::make($validated['password']);
            User::create($validated);
            return response()->json(['success' => true, 'message' => 'Đăng ký tài khoản thành công']);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
