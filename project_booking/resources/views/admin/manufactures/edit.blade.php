@extends('admin.layout')

@section('content')
<div class="container">
    <h4>Cập nhật nhà sản xuất</h4>

    <form action="{{ route('admin.manufactures.update', $manufacture->manu_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tên nhà sản xuất</label>
            <input type="text" name="manu_name"
                   value="{{ $manufacture->manu_name }}"
                   class="form-control" required>
        </div>

        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.manufactures.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
