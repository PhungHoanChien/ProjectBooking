<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background: #f4f6f9; }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #343a40;
        }
        .sidebar a {
            color: #c2c7d0;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover, .sidebar .active {
            background: #495057;
            color: #fff;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="d-flex">
    @include('admin.sidebar')

    <div class="flex-grow-1">
        @include('admin.header')

        <div class="content">
            @yield('content')
        </div>

        @include('admin.footer')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
