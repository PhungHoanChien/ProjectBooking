@extends('admin.layout')

@section('title','Cập nhật loại sản phẩm')

@section('content')
<div class="container-fluid">

    <h4 class="fw-bold mb-3">Cập nhật loại sản phẩm</h4>

    <form action="{{ route('admin.protypes.update', $protype->type_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên loại</label>
            <input type="text" name="type_name"
                   class="form-control"
                   value="{{ old('type_name', $protype->type_name) }}">
            @error('type_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-success">Cập nhật</button>
        <a href="{{ route('admin.protypes.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>

</div>
@endsection
