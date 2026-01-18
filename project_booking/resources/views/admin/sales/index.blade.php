@extends('admin.layout')

@section('title', 'Quản lý Sale')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">Danh sách Sale</h4>

        <a href="{{ route('admin.sales.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Thêm sale
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th width="60">ID</th>
                        <th>Số lượng bán</th>
                        <th>Ngày tạo</th>
                        <th width="160">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                        <tr>
                            <td>{{ $sale->id }}</td>
                            <td>{{ number_format($sale->Sell_number) }}</td>
                            <td>{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.sales.edit', $sale->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('admin.sales.destroy', $sale->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Xóa sale này?')"
                                            class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted">
                                Chưa có dữ liệu
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
