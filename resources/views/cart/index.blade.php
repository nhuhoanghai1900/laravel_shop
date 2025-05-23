@extends('layouts.app')
@section('title', 'Giỏ hàng')
@section('content')

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
                        <div class="cart-items">
                            @foreach ($cart as $item)
                                <div class="cart-item d-flex justify-content-between align-items-center mb-3 p-4 border">
                                    <div class="d-flex">
                                        <img src="{{ $item['img'] }}" alt="{{ $item['name'] }}" class="me-4 img-fluid rounded"
                                            style="width: 110px; height: auto; object-fit: cover;" />
                                        <div>
                                            <div class="fw-bold fs-5 mb-2">{{ $item['name'] }}</div>
                                            <div class="text-muted">Số lượng: {{ $item['quantity'] }}</div>
                                            <div class="text-muted">Màu sắc: {{ $item['color'] }}</div>
                                            <div class="text-muted mb-2">Kích thước: {{ $item['size'] }}</div>
                                            <!-- Giá và Tổng giá -->
                                            <div class="fs-6 d-flex align-items-center justify-content-start gap-3">
                                                <div>
                                                    Giá:
                                                    <span class="text-danger fw-semibold">
                                                        {{ number_format($item['price'], 0, ',', '.') }} đ
                                                    </span>
                                                </div>
                                                <div>
                                                    Tổng:
                                                    <span class="text-success fw-semibold">
                                                        {{ number_format($item['subtotal'], 0, ',', '.') }} đ
                                                    </span>
                                                </div>
                                                <div>
                                                    <button class="btn btn-danger px-3 py-2 btn-delete-cart"
                                                        data-id="{{ $item['product_id'] }}" data-color="{{ $item['color'] }}"
                                                        data-size="{{ $item['size'] }}">
                                                        <i class="bi bi-trash"></i> Xóa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <p class="text-danger empty-text-cart" style="{{ empty($cart) ? '' : 'display: none' }}">
                            <i class="bi bi-box-seam"></i> Không có sản phẩm nào trong giỏ hàng.
                        </p>
                        <hr>
                        <!-- Phí giao hàng và Tổng cộng -->
                        <div class="d-flex justify-content-between mb-2">
                            <span>Phí giao hàng</span>
                            <span>Miễn phí</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Tổng thanh toán</span>
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
                        <form id="orderPayment">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên tài khoản</label>
                                @if($user)
                                    <input id="name" name="name" type="text" class="form-control" autocomplete="name" required
                                        minlength="6" maxlength="255" value="{{ $user->name }}" disabled>
                                @else
                                    <input id="name" name="name" type="text" class="form-control" autocomplete="name" required
                                        minlength="6" maxlength="255" value="" disabled>
                                @endif

                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                @if($user)
                                    <input id="email" name="email" type="email" class="form-control" autocomplete="email"
                                        required maxlength="255" value="{{ $user->email }}" disabled>
                                @else
                                    <input id="email" name="email" type="email" class="form-control" autocomplete="email"
                                        required maxlength="255" value="" disabled>
                                @endif

                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Số Điện Thoại (*)</label>
                                <input id="phone" name="phone" type="tel" class="form-control" placeholder="0901234567"
                                    autocomplete="tel" required pattern="^0[0-9]{9,10}$"
                                    title="Số điện thoại bắt đầu bằng 0 và có 10-11 chữ số" value="0901234567">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Địa Chỉ (*)</label>
                                <input id="address" name="address" type="text" class="form-control"
                                    placeholder="Long Phước, Long Thành, Đồng Nai" autocomplete="street-address" required
                                    maxlength="255" value="Long Phước, Long Thành, Đồng Nai">
                            </div>

                            <div class="mb-3 form-check">
                                <input id="receiveAtHome" name="delivery_to_home" type="checkbox" class="form-check-input"
                                    checked>
                                <label class="form-check-label" for="receiveAtHome">
                                    Xác nhận địa chỉ nhận hàng
                                </label>
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea id="note" name="note" rows="3" class="form-control"
                                    placeholder="Giao giờ hành chính..."></textarea>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="cod" name="payment_cod" checked>
                                <label class="form-check-label" for="cod">
                                    Thanh toán khi nhận hàng (COD)
                                </label>
                            </div>

                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-check-circle-fill"></i> Xác nhận đặt hàng
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="successModalLabel"><i class="bi bi-check-square-fill"></i>
                            Thanh toán thành công
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="bi bi-emoji-kiss"></i> Cảm ơn bạn đã mua hàng tại CATMEN <i
                            class="bi bi-balloon-heart"></i> .<br>
                        <small>Thông tin đơn hàng đã được gửi đi, chúng tôi sẽ sớm liên hệ cho bạn!!!</small>
                        <div class="modal-footer p-2">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Hoàn tất</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
