@extends('admin.layout')

@section('title', 'Nhà sản xuất')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4>Danh sách nhà sản xuất</h4>
        <a href="{{ route('admin.manufactures.create') }}" class="btn btn-primary">
            Thêm mới
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tên nhà sản xuất</th>
                <th width="150">Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach($manufactures as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td class="text-start">{{ $item->manu_name }}</td>
                <td>
                    <a href="{{ route('admin.manufactures.edit', $item->manu_id) }}"
                       class="btn btn-sm btn-warning">Sửa</a>

                    <form action="{{ route('admin.manufactures.destroy', $item->manu_id) }}"
                          method="POST" class="d-inline"
                          onsubmit="return confirm('Xóa?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $manufactures->links() }}

</div>
@endsection
