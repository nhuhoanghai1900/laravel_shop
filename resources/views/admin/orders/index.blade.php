@extends('layouts.app')
@section('contain')

    <div class="px-4 py-5">
        <h2 class="mb-4 pb-2 border-bottom border-2 fw-bold text-danger"><i class="bi bi-boxes"></i> Danh sách đơn hàng
        </h2>

        <div class="table-responsive rounded shadow-sm">
            <table class="table table-bordered table-hover align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Mã đơn</th>
                        <th>Tên khách</th>
                        <th>SĐT</th>
                        <th>Giao tận nơi</th>
                        <th>Thanh toán</th>
                        <th>Thời gian</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>#{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td><span class="badge {{ $item->delivery_to_home ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->delivery_to_home ? 'Có' : 'Không' }}
                                </span></td>
                            <td><span class="badge {{ $item->payment_cod ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->payment_cod ? 'Có' : 'Không' }}
                                </span></td>
                            <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                            <td><a href="{{ route('admin.orders.show', $item->id) }}" class="btn btn-sm btn-success">Chi tiết</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
