@extends('admin.layout')

@section('title', 'Thêm người dùng')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Thêm người dùng</h4>

        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Quay lại
        </a>
    </div>

    {{-- ERROR VALIDATE --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                {{-- NAME --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Tên người dùng <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Mật khẩu <span class="text-danger">*</span>
                    </label>
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ROLE --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Vai trò <span class="text-danger">*</span>
                    </label>
                    <select name="role"
                            class="form-select @error('role') is-invalid @enderror">
                        <option value="">-- Chọn vai trò --</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user"  {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2">
                    <button class="btn btn-success">
                        <i class="bi bi-save"></i> Lưu
                    </button>

                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        Hủy
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
