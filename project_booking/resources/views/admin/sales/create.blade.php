@extends('admin.layout')

@section('title', 'Thêm sale')

@section('content')
<div class="container-fluid">

    <form action="{{ route('admin.sales.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Số lượng bán</label>
            <input type="number" name="Sell_number"
                   value="{{ old('Sell_number') }}"
                   class="form-control @error('Sell_number') is-invalid @enderror">
            @error('Sell_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.sales.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>

</div>
@endsection
