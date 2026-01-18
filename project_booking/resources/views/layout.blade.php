<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Auth')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }
        .auth-card {
            max-width: 420px;
            margin: auto;
            margin-top: 80px;
            padding: 30px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 10px 25px rgba(0,0,0,.1);
        }
    </style>
</head>
<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>
