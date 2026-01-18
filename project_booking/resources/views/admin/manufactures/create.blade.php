@extends('admin.layout')

@section('content')
<div class="container">
    <h4>Thêm nhà sản xuất</h4>

    <form action="{{ route('admin.manufactures.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Tên nhà sản xuất</label>
            <input type="text" name="manu_name" class="form-control" required>
        </div>

        <button class="btn btn-primary">Lưu</button>
        <a href="{{ route('admin.manufactures.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
