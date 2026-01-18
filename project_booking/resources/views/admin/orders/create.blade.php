@extends('admin.layout')

@section('title', 'Thêm đơn hàng')

@section('content')
<div class="container-fluid">

    <h4 class="fw-bold mb-3">Thêm đơn hàng</h4>

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

            <form action="{{ route('admin.orders.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Khách hàng</label>
                    <select name="user_id"
                            class="form-select @error('user_id') is-invalid @enderror">
                        <option value="">-- Chọn khách hàng --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Ngày đặt</label>
                    <input type="date"
                           name="order_date"
                           value="{{ old('order_date') }}"
                           class="form-control @error('order_date') is-invalid @enderror">
                    @error('order_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tổng tiền</label>
                    <input type="number"
                           name="total_price"
                           value="{{ old('total_price') }}"
                           class="form-control @error('total_price') is-invalid @enderror">
                    @error('total_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Trạng thái</label>
                    <select name="status"
                            class="form-select @error('status') is-invalid @enderror">
                        <option value="">-- Chọn trạng thái --</option>
                        <option value="pending">Chờ xử lý</option>
                        <option value="done">Hoàn thành</option>
                        <option value="cancel">Đã hủy</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-success">
                    <i class="bi bi-save"></i> Lưu
                </button>

                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                    Quay lại
                </a>
            </form>

        </div>
    </div>
</div>
@endsection
