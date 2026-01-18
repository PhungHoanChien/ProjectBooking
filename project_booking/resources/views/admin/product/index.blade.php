@extends('admin.layout')

@section('title', 'Quản lý sản phẩm')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">Danh sách sản phẩm</h4>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Thêm</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Hình</th>
                <th>Nhà SX</th>
                <th>Loại</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
        @foreach($products as $key => $product)
            <tr>
                <td>{{ $products->firstItem() + $key }}</td>
                <td class="text-start">{{ $product->name }}</td>
                <td>{{ number_format($product->price) }} đ</td>
                <td>
                    @if($product->pro_image)
                        <img src="{{ asset('storage/'.$product->pro_image) }}" width="60">
                    @endif
                </td>
                <td>{{ $product->manu_name }}</td>
                <td>{{ $product->type_name }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                          method="POST" class="d-inline"
                          onsubmit="return confirm('Xóa?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>

</div>
@endsection
