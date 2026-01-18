@extends('layout')

@section('title', 'Đăng nhập')

@section('content')
    <div class="auth-card">
        <h4 class="text-center mb-4 text-success">Đăng nhập</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    <div>{{ $err }}</div>
                @endforeach
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" autocomplete="on">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" autocomplete="email" required
                    value='{{ old(key: "email") }}'>
            </div>

            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" autocomplete="current-password" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Đăng nhập</button>
        </form>

        <div class="text-center mt-3">
            Chưa có tài khoản?
            <a href="{{ route('register') }}">Đăng ký</a>
        </div>
    </div>
@endsection