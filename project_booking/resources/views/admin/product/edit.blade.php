@extends('admin.layout')

@section('title', 'Cập nhật sản phẩm')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Cập nhật sản phẩm</h4>

        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Quay lại
        </a>
    </div>

    {{-- FORM --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.products.update', $product->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- TÊN SẢN PHẨM --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Tên sản phẩm <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $product->name) }}">
                    </div>

                    {{-- GIÁ --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Giá <span class="text-danger">*</span>
                        </label>
                        <input type="number"
                               name="price"
                               class="form-control"
                               value="{{ old('price', $product->price) }}">
                    </div>

                    {{-- NHÀ SẢN XUẤT --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Nhà sản xuất
                        </label>
                        <select name="manu_id" class="form-select">
                            @foreach($manufactures as $manu)
                                <option value="{{ $manu->manu_id }}"
                                    {{ $manu->manu_id == $product->manu_id ? 'selected' : '' }}>
                                    {{ $manu->manu_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- LOẠI SẢN PHẨM --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Loại sản phẩm
                        </label>
                        <select name="type_id" class="form-select">
                            @foreach($protypes as $type)
                                <option value="{{ $type->type_id }}"
                                    {{ $type->type_id == $product->type_id ? 'selected' : '' }}>
                                    {{ $type->type_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- HÌNH ẢNH --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Hình ảnh
                        </label>
                        <input type="file" name="pro_image" class="form-control">

                        @if($product->pro_image)
                            <img src="{{ asset('storage/' . $product->pro_image) }}"
                                 width="100"
                                 class="mt-2 rounded border">
                        @endif
                    </div>

                    {{-- MÔ TẢ --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-semibold">
                            Mô tả
                        </label>
                        <textarea name="description"
                                  rows="4"
                                  class="form-control">{{ old('description', $product->description) }}</textarea>
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="text-end">
                    <button class="btn btn-primary">
                        <i class="bi bi-save"></i> Cập nhật
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
