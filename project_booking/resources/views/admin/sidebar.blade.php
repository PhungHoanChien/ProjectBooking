<div class="sidebar">
    <h5 class="text-white text-center py-3 border-bottom">
        <i class="bi bi-speedometer2"></i> ADMIN PANEL
    </h5>

    {{-- DASHBOARD --}}
    <a href="{{ route('admin.dashboard') }}"
       class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-house-door"></i> Dashboard
    </a>

    <hr class="text-secondary">

    {{-- QUẢN LÝ SẢN PHẨM --}}
    <div class="px-3 text-uppercase text-secondary small mt-2">Quản lý sản phẩm</div>

    <a href="{{ route('admin.products.index') }}"
       class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
        <i class="bi bi-box"></i> Products
    </a>

    <a href="{{ route('admin.manufactures.index') }}"
       class="{{ request()->routeIs('admin.manufactures.index') ? 'active' : '' }}">
        <i class="bi bi-building"></i> Manufactures
    </a>

    <a href="{{ route('admin.protypes.index') }}"
       class="{{ request()->routeIs('admin.protypes.index') ? 'active' : '' }}">
        <i class="bi bi-tags"></i> Protypes
    </a>

    <hr class="text-secondary">

    {{-- BÁN HÀNG --}}
    <div class="px-3 text-uppercase text-secondary small mt-2">Bán hàng</div>

    <a href="{{ route('admin.orders.index') }}"
       class="{{ request()->routeIs('admin.orders.index') ? 'active' : '' }}">
        <i class="bi bi-receipt"></i> Orders
    </a>

    <a href="{{ route('admin.sales.index') }}"
       class="{{ request()->routeIs('admin.sales.index') ? 'active' : '' }}">
        <i class="bi bi-cash-stack"></i> Sales
    </a>

    <hr class="text-secondary">

    {{-- NGƯỜI DÙNG --}}
    <div class="px-3 text-uppercase text-secondary small mt-2">Hệ thống</div>

    <a href="{{ route('admin.users.index') }}"
       class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
        <i class="bi bi-people"></i> Users
    </a>

</div>
