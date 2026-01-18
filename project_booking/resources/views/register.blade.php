@extends('layout')

@section('title', 'Đăng ký')

@section('content')
<div class="auth-card">
    <h4 class="text-center mb-4 text-primary">Đăng ký tài khoản</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" autocomplete="on">
        @csrf

        <div class="mb-3">
            <label class="form-label" >Họ và tên</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value = '{{ old("name") }}'
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label" >Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                autocomplete="email"
                value = '{{ old('email') }}'
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input
                type="password"
                name="password"
                class="form-control"
                autocomplete="new-password"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label" >Nhập lại mật khẩu</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                autocomplete="new-password"
                required
            >
        </div>

        <button href="{{ route('register') }}" class="btn btn-primary w-100">Đăng ký</button>
    </form>

    <div class="text-center mt-3">
        Đã có tài khoản?
        <a href="{{ route('login') }}">Đăng nhập</a>
    </div>
</div>
@endsection
