<nav class="navbar-vertical navbar">
    <div class="vh-100" data-simplebar>
        <!-- Brand logo -->
        <a href="#" class="navbar-brand fw-bold fs-3">Zemilan</a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a href="" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.category') }}" class="nav-link ">Kategory</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.product') }}" class="nav-link ">Produk</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}"
                    class="nav-link {{ Request::routeIs('admin.user.index') ? 'active' : '' }}">User</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link ">Laporan Keuangan</a>
            </li>
        </ul>
    </div>
</nav>
