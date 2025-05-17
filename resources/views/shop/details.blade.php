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
    <form id="addFormCart">
        <section class="container mx-auto product-details">
            <img src="{{ $product->img }}" alt="{{ $product->slug }}">
            <div class="product-des">
                <h5 class="fw-bold">{{ $product->name }}</h5>
                <h5 class="fs-6 text-danger">{{ number_format($product->price, 0, ',', '.')}} đ</h5>
                <p class="text-dark fst-italic">
                    Giá Hời áp dụng đến hết ngày 31/07/2025</p>
                <div class="mb-2">
                    <select name="color" class="form-select" aria-label="Default select example" required>
                        <option value="">-- Chọn màu --</option>
                        <option value="Đỏ">Đỏ</option>
                        <option value="Xanh">Xanh</option>
                        <option value="Xám">Xám</option>
                        <option value="Đen">Đen</option>
                        <option value="Trắng">Trắng</option>
                    </select>
                </div>
                <div class="mb-2">
                    <select name="size" class="form-select" aria-label="Default select example" required>
                        <option value="">-- Chọn size --</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="product-action mb-3">
                    <label for="quantity">Số lượng</label>
                    <select id="quantity" name="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <button type="submit" class="add-to-cart" data-id='{{ $product->id }}'>THÊM VÀO GIỎ HÀNG</button>
                </div>
                <small class="text-dark fst-italic">Mã sản phẩm: {{ $product->sku }}</small> <br />
                <p class="full-description text-dark text-justify mt-2">
                    {!! nl2br(e($product->description->content)) !!}
                </p>
                <details class="summary-description">
                    <summary>Xem mô tả sản phẩm</summary>
                    <p class="text-dark text-justify mt-2">
                        {!! nl2br(e($product->description->content)) !!}
                    </p>
                </details>
            </div>
        </section>
    </form>
@endsection
