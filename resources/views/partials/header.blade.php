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
                    @foreach ($quanAoCategories as $cat)
                        <a href="/shop/{{ $cat->slug }}?category_id={{ $cat->id }}">{{ $cat->name }}</a>
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
                    @foreach ($phuKienCategories as $cat)
                        <a href="/shop/{{ $cat->slug }}?category_id={{ $cat->id }}">{{ $cat->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="header-icon d-flex gap-3">
            <i class="bi bi-newspaper"></i>
            <i class="bi bi-person"></i>
            @php
                $totalQuantity = array_sum(array_column($cart, 'quantity'));
            @endphp
            <a href="{{ route('cart.show') }}">
                <i class="bi bi-cart2"></i>
                <span class="cart-header badge">({{ $totalQuantity }})</span>
            </a>
        </div>
    </div>
</div>
<script>
    // window.location.reload()
</script>
