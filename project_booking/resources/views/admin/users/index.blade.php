@extends('admin.layout')

@section('title', 'Quản lý người dùng')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Danh sách người dùng</h4>

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Thêm người dùng
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="150">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($user->image_user)
                                    <img src="{{ asset('storage/'.$user->image_user) }}"
                                         width="50" class="rounded-circle">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ strtoupper($user->role) }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Xóa người dùng này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Chưa có dữ liệu</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $users->links() }}
        </div>
    </div>

</div>
@endsection
