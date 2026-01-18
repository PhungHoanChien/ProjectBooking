@extends('admin.layout')

@section('title','Thêm loại sản phẩm')

@section('content')
<div class="container-fluid">

    <h4 class="fw-bold mb-3">Thêm loại sản phẩm</h4>

    <form action="{{ route('admin.protypes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tên loại</label>
            <input type="text" name="type_name"
                   class="form-control"
                   value="{{ old('type_name') }}">
            @error('type_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Lưu</button>
        <a href="{{ route('admin.protypes.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>

</div>
@endsection
