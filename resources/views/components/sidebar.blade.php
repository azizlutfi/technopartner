<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Technopartner') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Home -->
    <li class="nav-item {{ $active === 'home' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}">
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Kategori -->
    <li class="nav-item {{ $active === 'kategori' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/kategori')}}">
            <span>Kategori</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Transaksi -->
    <li class="nav-item {{ $active === 'transaksi' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/transaksi')}}">
            <span>Transaksi</span>
        </a>
    </li>

   
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->