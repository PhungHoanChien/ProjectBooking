@extends('admin.layout')

@section('title','Quản lý loại sản phẩm')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4>Danh sách loại sản phẩm</h4>
        <a href="{{ route('admin.protypes.create') }}" class="btn btn-primary">Thêm</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tên loại</th>
                <th width="150">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($protypes as $key => $type)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $type->type_name }}</td>
                <td>
                    <a href="{{ route('admin.protypes.edit',$type->type_id) }}"
                       class="btn btn-warning btn-sm">Sửa</a>

                    <form action="{{ route('admin.protypes.destroy',$type->type_id) }}"
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

    {{ $protypes->links() }}
</div>
@endsection
