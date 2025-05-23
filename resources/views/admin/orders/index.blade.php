@extends('layouts.app')
@section('title', 'Quản lý đơn hàng')
@section('content')

    <div class="px-4 py-5">
        <h2 class="mb-4 pb-2 border-bottom border-2 fw-bold text-danger"><i class="bi bi-boxes"></i> Danh sách đơn hàng
        </h2>

        <div class="table-responsive rounded shadow-sm">
            <table class="table table-bordered table-hover align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Chủ tài khoản</th>
                        <th>Email</th>
                        <th>Số lần thanh toán</th>
                        <th>Thanh toán gần nhất</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->orders_count }}</td>
                            @if ($item->latestOrder)
                                <td>{{ \Carbon\Carbon::parse($item->latestOrder->created_at)->format('d/m/Y H:i:s') }}</td>
                            @else
                                <td>Chưa có đơn hàng</td>
                            @endif
                            <td><a href="{{ route('admin.orders.show', ['userId' => $item->id]) }}"
                                    class="btn btn-sm btn-success" target="_blank"> Chi tiết</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted">Không có đơn hàng nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
