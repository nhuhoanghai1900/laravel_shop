@extends('layouts.app')

@section('contain')
    <div class="header-products">
        <div>
            <i class="bi bi-house-fill"></i>
            <a href="/">Trang Chủ</a> /
            <a href="/shop/{{ $product->category->slug }}?category_id={{ $product->category->id }}">
                <span>{{ $product->category->name }}</span></a> /
            <span>{{ $product->name }}</span>
        </div>
        <div class="search-box">
            <button class="btn-search"><i class="bi bi-search-heart"></i></button>
            <input type="text" class="input-search" placeholder="Lựa chọn trong tay bạn...">
        </div>
    </div>

    <section class="container mx-auto product-details">
        <div class="product-img">
            <img src="{{ $product->img }}" alt="{{ $product->slug }}">
        </div>
        <div class="product-des">
            <small>{{ $product->name }}</small>
            <h5>{{ number_format($product->price, 0, ',', '.' )}}đ</h5>
        </div>
    </section>
@endsection