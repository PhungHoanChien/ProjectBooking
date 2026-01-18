<nav class="navbar navbar-expand navbar-light bg-white shadow-sm px-3">
    <span class="navbar-brand fw-bold">ADMIN PANEL</span>

    <div class="ms-auto">
        <span class="me-3">
            <i class="bi bi-person-circle"></i>
            {{ auth()->user()->name ?? 'Admin' }}
        </span>

        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
</nav>
