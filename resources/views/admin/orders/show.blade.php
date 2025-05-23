@extends('layouts.app')
@section('title', 'Chi tiết đơn hàng')
@section('content')

    @foreach ($user->orders as $order)
        <div class="container py-3">
            <!-- Header đơn hàng -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold text-danger"><i class="bi bi-toggle2-off"></i> MÃ ĐƠN: #{{ $order->id }}</h4>
                </div>
                <div class="card-body">
                    <!-- Thông tin khách -->
                    <div class="row mb-2">
                        <div class="col-md-6"><strong>Khách hàng:</strong> {{ $user->name }}</div>
                        <div class="col-md-6"><strong>SĐT:</strong> {{ $order->phone }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6"><strong>Email:</strong> {{ $user->email }}</div>
                        <div class="col-md-6"><strong>Địa chỉ:</strong> {{ $order->address }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6"><strong>Giao hàng tận nơi:</strong>
                            <span class="badge {{ $order->delivery_to_home ? 'bg-success' : 'bg-danger' }}">
                                {{ $order->delivery_to_home ? 'Có' : 'Không' }}
                            </span>
                        </div>
                        <div class="col-md-6"><strong>Thanh toán khi nhận hàng:</strong>
                            <span class="badge {{ $order->payment_cod ? 'bg-success' : 'bg-danger' }}">
                                {{ $order->payment_cod ? 'Có' : 'Không' }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6"><strong>Ghi chú:</strong> {{ $order->note ?? '-' }}</div>
                        <div class="col-md-6"><strong>Thời gian đặt:</strong> {{ $order->created_at->format('d/m/Y H:i:s') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Danh sách sản phẩm -->
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold text-success"><i class="bi bi-toggle2-off"></i> Sản phẩm trong đơn hàng</h4>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-hover mb-0 align-middle text-center">
                        <thead class="table-light">
                            <tr class="align-middle text-nowrap">
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Mã sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá mỗi cái</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($order->orderItems as $item)
                                @php $total += $item->total_price; @endphp
                                <tr>
                                    <td class="text-center" style="width: 100px;">
                                        <img src="{{ asset($item->product->img) }}" onclick="showImagePopup(this)"
                                            style="max-width: 80px; cursor: zoom-in;">
                                    </td>
                                    <td>{{ $item->product->name ?? 'Sản phẩm đã xóa' }}</td>
                                    <td>{{ $item->product->sku}}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->price_each, 0, ',', '.') }}₫</td>
                                    <td>{{ number_format($item->total_price, 0, ',', '.') }}₫</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-success fw-bold">
                                <td colspan="5" class="text-end">Tổng cộng</td>
                                <td class="text-end">{{ number_format($total, 0, ',', '.') }}₫</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

    <div id="popupImg" onclick="hideImagePopup()" hidden
        style="position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.8);  display: flex; align-items: center; justify-content: center; z-index: 9999;">
        <img src="" style="max-width: 25vw; max-height: 60vh;">
    </div>
@endsection

<script>
    function showImagePopup(img) {
        const popup = document.getElementById('popupImg')
        const showPopup = popup.querySelector('img')
        showPopup.src = img.src
        popup.hidden = false
    }
    function hideImagePopup() {
        document.getElementById('popupImg').hidden = true;
    }
</script>
