@extends('layouts.app')

@section('contain')

    <div class="header-cart">
        <i class="bi bi-house-fill"></i>
        <a href="/">Trang Chủ</a> / Thông tin giỏ hàng của bạn.
    </div>

    <div class="container my-4">
        <h2 class="mb-4"><i class="bi bi-credit-card"></i> Thanh toán đơn hàng</h2>

        <div class="row">
            <!-- Cột trái: Chi tiết đơn hàng -->
            <div class="col-lg-7 mb-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Chi tiết đơn hàng <i class="bi bi-cart4"></i>
                            <small class="total-cart">({{ $totalQuantity }})</small>
                        </strong>
                    </div>
                    <div class="card-body">
                        <!-- Chi tiết sản phẩm 1 -->
                        @foreach ($cart as $item)
                            <div
                                class="cart-item d-flex justify-content-between align-items-center mb-3 p-3 border rounded shadow-sm">
                                <!-- Sản phẩm -->
                                <div class="d-flex">
                                    <img src="{{ $item['img'] }}" alt="{{ $item['name'] }}" class="me-4 img-fluid"
                                        style="width: 110px; height: auto; object-fit: cover;" />
                                    <div>
                                        <div class="fw-bold fs-6">{{ $item['name'] }}</div>
                                        <div class="text-muted mb-2">Số lượng: {{ $item['quantity'] }}</div>
                                        <div class="text-muted mb-2">Màu sắc: {{ $item['color'] }}</div>
                                        <div class="text-muted mb-3">Kích thước: {{ $item['size'] }}</div>
                                        <div class="fs-6">
                                            Giá: <span class="text-danger">{{ number_format($item['price'], 0, ',', '.') }}
                                                đ</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-danger btn-sm btn-delete-cart" data-id="{{ $item['id'] }}"
                                        data-color="{{ $item['color'] }}" data-size="{{ $item['size'] }}">Xóa</button>
                                </div>
                            </div>
                        @endforeach
                        <p class="text-danger empty-text-cart" style="{{ empty($cart) ? '' : 'display: none' }}">
                            <i class="bi bi-box-seam"></i> Không có sản phẩm nào trong giỏ hàng.
                        </p>

                        <hr>
                        <!-- Phí giao hàng và Tổng cộng -->
                        <div class="d-flex justify-content-between mb-2">
                            <span>Phí giao hàng</span>
                            <span>Miễn phí</span>
                        </div>

                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Tổng cộng</span>
                            <span class="total-price">
                                {{ number_format($totalPrice, 0, ",", ".") }} đ
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cột phải: Thông tin người nhận -->
            <div class="col-lg-5 mb-4">
                <div class="card">
                    <div class="card-header"><strong><i class="bi bi-info-circle"></i> Thông tin người nhận hàng</strong>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ tên</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Nguyễn Văn A"
                                    autocomplete="name">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input id="phone" name="phone" type="tel" class="form-control" placeholder="0901234567"
                                    autocomplete="phone">
                            </div>
                            <div class="mb-3 form-check">
                                <label for="location" class="form-check-label" for="receiveAtHome">
                                    Nhận hàng tại nhà <i class="bi bi-house-fill"></i>
                                </label>
                                <input id="location" name="location" type="checkbox" class="form-check-input"
                                    id="receiveAtHome">
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea id="note" name="note" rows="3" class="form-control"
                                    placeholder="Giao giờ hành chính..."></textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="cod">
                                <label class="form-check-label" for="cod">
                                    Thanh toán khi nhận hàng (COD)
                                </label>
                            </div>
                            <button type="submit" class="btn btn-warning"><i class="bi bi-check-circle-fill"></i> Xác nhận
                                đặt hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
