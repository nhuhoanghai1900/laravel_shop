@extends('layouts.app')

@section('title', 'Đăng ký CATMEN')
@section('content')
    <div class="d-flex justify-content-center align-items-center"
        style="min-height: 100vh; background: linear-gradient(135deg, #e0e7ff 0%, #f5f7fa 100%);">
        <div class="bg-white p-5 shadow-lg" style="max-width: 500px; width: 100%; box-shadow: 0 8px 24px rgba(0,0,0,0.15);">

            <h2 class="mb-1 text-center fw-bold text-primary">Đăng ký tài khoản</h2>
            <p class="mb-3 text-center text-muted mb-1">Tạo tài khoản để trải nghiệm dịch vụ tốt nhất!</p>

            {{-- Hiển thị lỗi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form đăng ký --}}
            <form id="registerForm" action="" novalidate>
                @csrf
                <div class="mb-1">
                    <label for="name" class="form-label">Họ Tên</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required
                        autofocus placeholder="Nhập tên của bạn">
                    <div class="error-message" id="error-name"></div>
                </div>

                <div class="mb-1">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required
                        placeholder="example@mail.com">
                    <div class="error-message" id="error-email"></div>
                </div>

                <div class="mb-1">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" required
                        placeholder="Ít nhất 6 ký tự" autocomplete="password">
                    <div class="error-message" id="error-password"></div>
                </div>

                <div class="mb-1">
                    <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        required placeholder="Nhập lại mật khẩu" autocomplete="password_confirmation">
                    <div class="error-message" id="error-password"></div>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-semibold" style="background: linear-gradient(45deg, #3b82f6, #2563eb);
            border: none; transition: background 0.3s ease;">Đăng ký</button>

                <div class="d-flex justify-content-center mt-2 gap-2">
                    <span>Đã có tài khoản?</span>
                    <a class="text-danger" href="{{ route('login.login') }}">Đăng nhập tại đây</a>
                </div>
            </form>

        </div>
    </div>
@endsection
