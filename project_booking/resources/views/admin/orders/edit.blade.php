@extends('admin.layout')

@section('title', 'Cập nhật đơn hàng')

@section('content')
<div class="container-fluid">

    <h4 class="fw-bold mb-3">Cập nhật đơn hàng</h4>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.orders.update', $order->order_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- KHÁCH HÀNG --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Khách hàng <span class="text-danger">*</span>
                    </label>
                    <select name="user_id"
                            class="form-select @error('user_id') is-invalid @enderror">
                        <option value="">-- Chọn khách hàng --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NGÀY ĐẶT --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Ngày đặt <span class="text-danger">*</span>
                    </label>
                    <input type="date"
                           name="order_date"
                           value="{{ old('order_date', $order->order_date) }}"
                           class="form-control @error('order_date') is-invalid @enderror">
                    @error('order_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TỔNG TIỀN --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Tổng tiền <span class="text-danger">*</span>
                    </label>
                    <input type="number"
                           name="total_price"
                           value="{{ old('total_price', $order->total_price) }}"
                           class="form-control @error('total_price') is-invalid @enderror">
                    @error('total_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TRẠNG THÁI --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Trạng thái <span class="text-danger">*</span>
                    </label>
                    <select name="status"
                            class="form-select @error('status') is-invalid @enderror">
                        <option value="">-- Chọn trạng thái --</option>
                        <option value="pending"  {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                        <option value="shipping" {{ old('status', $order->status) == 'shipping' ? 'selected' : '' }}>Đang giao</option>
                        <option value="done"     {{ old('status', $order->status) == 'done' ? 'selected' : '' }}>Hoàn thành</option>
                        <option value="cancel"   {{ old('status', $order->status) == 'cancel' ? 'selected' : '' }}>Hủy</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BUTTON (GIỐNG CREATE) --}}
                <div class="d-flex justify-content-start gap-2">
                    <button class="btn btn-warning">
                        <i class="bi bi-save"></i> Cập nhật
                    </button>

                    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                        Quay lại
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
