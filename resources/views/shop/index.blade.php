@extends('layouts.app')
@section('content')

    <div class="header-products">
        <div class="info-link">
            <i class="bi bi-house-fill"></i>
            <a href="/">Trang Chủ</a> / <span>{{ $categoryName }}</span>
        </div>
        <div class="search-box">
            <button class="btn-search"><i class="bi bi-search-heart"></i></button>
            <input type="text" class="input-search" placeholder="Tìm kiếm sản phẩm...">
        </div>
    </div>

    <div class="container mx-auto section-products">
        @foreach ($products as $pro)
            <div class="products-item">
                <div class="item-img">
                    <a href="{{ route('shop.show', ['categoryslug' => $slug, 'productSlug' => $pro->slug]) }}">
                        <img src='{{ $pro->img }}' alt="{{ $pro->slug }}"></a>
                </div>
                <div class="item-des d-flex flex-column gap-1">
                    <small>{{ $pro->name }}</small>
                    <strong><a class="text-dark"
                            href="{{ route('shop.show', ['categoryslug' => $slug, 'productSlug' => $pro->slug]) }}">
                            {{ number_format($pro->price, 0, ',', '.') }} đ
                        </a></strong>
                </div>
            </div>
        @endforeach
    </div>

@endsection
