@extends('admin.layout')

@section('title', 'Thêm sản phẩm')

@section('content')
<div class="container-fluid">

    <h4 class="fw-bold mb-3">Thêm sản phẩm</h4>

    <form action="{{ route('admin.products.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- TÊN --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name"
                       class="form-control"
                       value="{{ old('name') }}">
            </div>

            {{-- GIÁ --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Giá</label>
                <input type="number" name="price"
                       class="form-control"
                       value="{{ old('price') }}">
            </div>

            {{-- NHÀ SẢN XUẤT --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Nhà sản xuất</label>
                <select name="manu_id" class="form-select">
                    <option value="">-- Chọn --</option>
                    @foreach($manufactures as $manu)
                        <option value="{{ $manu->manu_id }}">
                            {{ $manu->manu_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- LOẠI --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Loại sản phẩm</label>
                <select name="type_id" class="form-select">
                    <option value="">-- Chọn --</option>
                    @foreach($protypes as $type)
                        <option value="{{ $type->type_id }}">
                            {{ $type->type_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- ẢNH --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Hình ảnh</label>
                <input type="file" name="image" class="form-control">
            </div>

            {{-- MÔ TẢ --}}
            <div class="col-md-12 mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" rows="4"
                          class="form-control">{{ old('description') }}</textarea>
            </div>

        </div>

        <button class="btn btn-success">
            Lưu sản phẩm
        </button>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-secondary">
            Quay lại
        </a>
    </form>

</div>
@endsection
