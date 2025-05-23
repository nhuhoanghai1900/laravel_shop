@extends('layouts.app')
@section('content')

    <div class="header-products">
        <div class="info-link">
            <i class="bi bi-house-fill"></i>
            <a href="/">Trang Chủ</a> / <span>{{ $category->name }}</span>
        </div>
        <div class="search-box">
            <button class="btn-search"><i class="bi bi-search-heart"></i></button>
            <input type="text" class="input-search" placeholder="Tìm kiếm sản phẩm...">
        </div>
    </div>

    <div class="container mx-auto section-products">
        @foreach ($products as $product)
            <div class="products-item">
                <div class="item-img">
                    <a href="{{ route('shop.details', ['product' => $product->slug]) }}">
                        <img src='{{ $product->img }}' alt="{{ $product->slug }}"></a>
                </div>
                <div class="item-des d-flex flex-column gap-1">
                    <small>{{ $product->name }}</small>
                    <strong>
                        <a class="text-dark" href="{{ route('shop.details', ['product' => $product->slug]) }}">
                            {{ number_format($product->price, 0, ',', '.') }} đ
                        </a>
                    </strong>
                </div>
            </div>
        @endforeach
    </div>

@endsection
