@extends('layouts.app')

@section('contain')
    <div class="header-products">
        <div>
            <i class="bi bi-house-fill"></i>
            <a href="/">Trang Chủ</a> / <span>{{ $categoryName }}</span>
        </div>
        <div class="search-box">
            <button class="btn-search"><i class="bi bi-search-heart"></i></button>
            <input type="text" class="input-search" placeholder="Lựa chọn trong tay bạn...">
        </div>
    </div>

    <section class="container mx-auto section-products">
        @foreach ($products as $pro)
            <div class="products-item">
                <a href="#"><img src='{{ $pro->img }}' alt="{{ $pro->slug }}"></a>
                <span><a href="#">{{ number_format($pro->price, 0, ',', '.') }} đ</a></span>
                <small class="">{{ $pro->name }}</small>
            </div>
        @endforeach
    </section>
@endsection
