@extends('admin.layout')

@section('title', 'Cập nhật người dùng')

@section('content')
<div class="container-fluid">

    <h4 class="fw-bold mb-3">Cập nhật người dùng</h4>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.users.update', $user->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- NAME --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Mật khẩu (để trống nếu không đổi)
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
                    <label class="form-label fw-semibold">Quyền</label>
                    <select name="role"
                            class="form-select @error('role') is-invalid @enderror">
                        <option value="">-- Chọn quyền --</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                            User
                        </option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- IMAGE --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Ảnh đại diện</label>
                    <input type="file"
                           name="image_user"
                           class="form-control @error('image_user') is-invalid @enderror">
                    @error('image_user')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if($user->image_user)
                        <img src="{{ asset('storage/' . $user->image_user) }}"
                             width="80"
                             class="rounded mt-2">
                    @endif
                </div>

                {{-- BUTTON --}}
                <div class="mt-4">
                    <button class="btn btn-warning">
                        <i class="bi bi-save"></i> Cập nhật
                    </button>

                    <a href="{{ route('admin.users.index') }}"
                       class="btn btn-secondary ms-2">
                        Quay lại
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
