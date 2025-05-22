@extends('layouts.app')

@section('title', 'Đăng nhập CATMEN')
@section('content')

    <div class="d-flex justify-content-center align-items-center"
        style="min-height: 90vh; background: linear-gradient(135deg, #e0e7ff 0%, #f5f7fa 100%);">
        <div class="bg-white p-5 rounded-4 shadow-lg"
            style="max-width: 460px; width: 100%; box-shadow: 0 8px 24px rgba(0,0,0,0.15);">

            <h2 class="mb-3 text-center fw-bold text-primary">Đăng nhập tài khoản</h2>
            <p class="text-center text-muted mb-4">Tạo tài khoản để trải nghiệm dịch vụ tốt nhất!</p>

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

            {{-- Form đăng nhập --}}
            <form id="loginForm" action="" novalidate>
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required
                        placeholder="example@mail.com">
                    <div id="error-email" class="error-message"></div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" required
                        placeholder="Ít nhất 6 ký tự" autocomplete="password">
                    <div id="error-password" class="error-message"></div>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-semibold" style="background: linear-gradient(45deg, #3b82f6, #2563eb);
            border: none; transition: background 0.3s ease;">Đăng nhập</button>

                <div class="d-flex justify-content-center mt-2 gap-2">
                    <span>Chưa có tài khoản?</span>
                    <a class="text-danger" href="{{ route('register.register') }}">Đăng ký tại đây</a>
                </div>
            </form>

        </div>
    </div>


@endsection
