<div class="header-container">
    <div class="dropdown">
        <div class="header-start">
            <a href="/"><img src="/img/logo.jpg" alt="logo"></a>
        </div>

        <div class="header-center">
            <a href="/"><i class="bi bi-house-door"></i> Trang Chủ</a>
            <div class="dropdown-list">
                <div class="dropdown-text">
                    <a href="#" class="m-0">Khuyến Mãi - Giảm Giá<i class="bi bi-chevron-down"></i><span
                            class="overlay"></span></a>
                </div>
                <div class="dropdown-content">
                    @foreach ($clothesCategories as $category)
                        <a href="{{ route('shop.show', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
            <a href="#"><i class="bi bi-calendar-check"></i> Mở Bán Tuần Này</a>
            <div class="dropdown-list">
                <div class="dropdown-text">
                    <a href="#" class="m-0">Phụ Kiện<i class="bi bi-chevron-down"></i>
                        <span class="overlay"></span>
                    </a>
                </div>
                <div class="dropdown-content">
                    @foreach ($accessoryCategories as $category)
                        <a href="{{ route('shop.show', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="header-icon d-flex align-items-center gap-3">
            <i class="bi bi-newspaper fs-5"></i>
            @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle d-flex align-items-center gap-1" type="button"
                        id="dropdownMenuButtonAdmin" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person"></i> {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButtonAdmin">
                        <li><a class="dropdown-item text-dark" href="{{ route('admin.orders.index') }}">Quản lý</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item text-dark" type="submit">Đăng xuất</button>
                        </form>
                    </ul>
                </div>
            @elseif (Auth::check() && Auth::user()->role === 'user')
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle d-flex align-items-center gap-1" type="button"
                        id="dropdownMenuButtonUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person"></i> {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButtonUser">
                        <li><a class="dropdown-item text-dark" href="#">Hồ sơ cá nhân</a></li>
                        <li><a class="dropdown-item text-dark" href="#">Lịch sử thanh toán</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item text-dark" type="submit">Đăng xuất</button>
                        </form>
                    </ul>
                </div>
            @else
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle d-flex align-items-center gap-1" type="button"
                        id="dropdownMenuButtonGuest" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person"></i> Tài khoản
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButtonGuest">
                        <li><a class="dropdown-item text-dark" href="{{ route('login.login') }}">Đăng nhập</a></li>
                        <li><a class="dropdown-item text-dark" href="{{ route('register.register') }}">Đăng ký</a></li>
                    </ul>
                </div>
            @endif

            @php
                $totalQuantity = array_sum(array_column($cart, 'quantity'));
            @endphp
            <a href="{{ route('cart.index') }}" class="position-relative d-flex align-items-center">
                <i class="bi bi-cart2 fs-5"></i>
                <span class="cart-header badge bg-danger ms-1">({{ $totalQuantity }})</span>
            </a>
        </div>

    </div>
</div>
