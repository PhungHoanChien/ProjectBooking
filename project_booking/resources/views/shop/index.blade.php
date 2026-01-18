<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Fast Food Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
        }

        .product-card img {
            height: 180px;
            object-fit: cover;
        }

        .product-card {
            transition: 0.2s;
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .category a {
            color: #333;
        }

        .category a:hover {
            color: #dc3545;
            font-weight: 500;
        }
    </style>
</head>

<body>

    {{-- ===== HEADER ===== --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('shop.index') }}">
                🍔 FAST FOOD SHOP
            </a>

            <div class="d-flex align-items-center gap-3">

                @auth
                    <span class="text-white">
                        Xin chào, <strong>{{ Auth::user()->name }}</strong>
                    </span>

                    <a href="{{ route('cart.index') }}" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-cart"></i> Giỏ hàng
                    </a>

                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-danger btn-sm">
                        Đăng xuất
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('showLogin') }}" class="btn btn-outline-light btn-sm">
                        Đăng nhập
                    </a>
                @endauth

            </div>
        </div>
    </nav>

    {{-- ===== CONTENT ===== --}}
    <div class="container my-4">
        @if(session('success'))
            <div class="alert alert-success text-center rounded-0 mb-0">
                <i class="bi bi-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif
        <div class="row g-4">

            {{-- ===== CATEGORY ===== --}}
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold bg-white">
                        <i class="bi bi-grid"></i> Danh mục
                    </div>
                    <ul class="list-group list-group-flush category">
                        <li class="list-group-item py-3">
                            🍔 <a href="#" class="text-decoration-none">Burger</a>
                        </li>
                        <li class="list-group-item py-3">
                            🍗 <a href="#" class="text-decoration-none">Gà rán</a>
                        </li>
                        <li class="list-group-item py-3">
                            🍟 <a href="#" class="text-decoration-none">Đồ ăn nhanh</a>
                        </li>
                        <li class="list-group-item py-3">
                            🥤 <a href="#" class="text-decoration-none">Nước uống</a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- ===== PRODUCTS ===== --}}
            <div class="col-md-9">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold mb-0">🔥 Sản phẩm</h4>
                </div>

                <div class="row g-4">
                    @forelse($products as $product)
                        <div class="col-md-4">
                            <div class="card product-card h-100 border-0">

                                <img src="{{ asset('storage/' . $product->pro_image) }}" class="card-img-top">

                                <div class="card-body text-center">
                                    <h6 class="fw-bold text-truncate">
                                        {{ $product->name }}
                                    </h6>

                                    <p class="text-danger fw-bold mb-3">
                                        {{ number_format($product->price) }} đ
                                    </p>
                                </div>

                                <div class="card-footer bg-white border-0 pb-3">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button class="btn btn-success btn-sm w-100">
                                            <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                Chưa có sản phẩm
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>

    {{-- ===== FOOTER ===== --}}
    <footer class="bg-dark text-white text-center py-3 mt-5">
        © {{ date('Y') }} Fast Food Shop | Laravel
    </footer>

</body>

</html>