@extends('layouts.app')
@section('contain')

    <div class="px-4 py-5">
        <h2 class="mb-4 pb-2 border-bottom border-2 fw-bold text-warning"><i class="bi bi-boxes"></i> Danh sách đơn hàng</h2>

        <div class="table-responsive rounded shadow-sm">
            <table class="table table-bordered table-hover align-middle text-nowrap mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Mã đơn</th>
                        <th>Mã khách hàng</th>
                        <th>Tên khách</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Ghi chú</th>
                        <th>Thanh toán (COD)</th>
                        <th>Giao hàng tận nơi</th>
                        <th>Thời gian đặt</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dữ liệu mẫu -->
                    <tr>
                        <td>#1001</td>
                        <td>U001</td>
                        <td>Nguyễn Văn A</td>
                        <td>0909123456</td>
                        <td>vana@example.com</td>
                        <td>123 Đường A, Quận 1</td>
                        <td>Không giao giờ hành chính</td>
                        <td><span class="badge bg-success">Có</span></td>
                        <td><span class="badge bg-success">Có</span></td>
                        <td>17/05/2025 14:23</td>
                    </tr>
                    <tr>
                        <td>#1002</td>
                        <td>U002</td>
                        <td>Trần Thị B</td>
                        <td>0912345678</td>
                        <td>thib@example.com</td>
                        <td>456 Đường B, Quận 3</td>
                        <td>Giao buổi tối</td>
                        <td><span class="badge bg-danger">Không</span></td>
                        <td><span class="badge bg-success">Có</span></td>
                        <td>17/05/2025 15:10</td>
                    </tr>
                    <tr>
                        <td>#1003</td>
                        <td>U003</td>
                        <td>Phạm Văn C</td>
                        <td>0987654321</td>
                        <td>vanc@example.com</td>
                        <td>789 Đường C, Quận 5</td>
                        <td>Gọi trước khi giao</td>
                        <td><span class="badge bg-success">Có</span></td>
                        <td><span class="badge bg-danger">Không</span></td>
                        <td>16/05/2025 10:05</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection
