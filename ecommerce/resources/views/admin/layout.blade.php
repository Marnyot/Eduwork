<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    @vite(['resources/css/fonts.css', 'resources/js/app.js'])
  </head>
  <body style="background: var(--edu-surface-2);">
    <nav class="navbar navbar-expand-lg admin-navbar">
      <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">MyEcommerce <span class="fw-normal text-muted">Admin</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">Order</a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-lg-center gap-lg-3">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Lihat situs</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2">
              <span class="text-muted small">{{ Auth::user()->name }}</span>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-secondary btn-logout">Keluar</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show m-3 mb-0" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <main class="container py-4">
      @yield('content')
    </main>

    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
