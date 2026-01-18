@extends('admin.layout')

@section('title', 'Quản lý đơn hàng')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Danh sách đơn hàng</h4>

        <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Thêm đơn hàng
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- TABLE --}}
    <div class="card shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th width="50">#</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th width="200">Hành động</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($orders as $key => $order)
                    <tr>
                        <td>{{ $key + 1 }}</td>

                        <td class="text-start">
                            {{ $order->user->name ?? 'N/A' }}
                        </td>

                        <td>{{ $order->order_date }}</td>

                        <td>{{ number_format($order->total_price) }} đ</td>

                        <td>
                            @php
                                $badge = match($order->status) {
                                    'pending' => 'secondary',
                                    'shipping' => 'primary',
                                    'done' => 'success',
                                    'cancel' => 'danger',
                                    default => 'dark'
                                };
                            @endphp

                            <span class="badge bg-{{ $badge }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>

                        <td>

                            {{-- EDIT --}}
                            <a href="{{ route('admin.orders.edit', $order->order_id) }}"
                               class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.orders.destroy', $order->order_id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Xóa đơn hàng này?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted py-4">
                            Chưa có đơn hàng nào
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{-- PAGINATION --}}
            <div class="mt-3">
                {{ $orders->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
