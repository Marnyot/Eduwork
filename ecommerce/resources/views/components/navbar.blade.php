<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Eduwork</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}" {{ request()->routeIs('home') ? 'aria-current=page' : '' }}>Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.public') }}" {{ request()->routeIs('products.*') ? 'aria-current=page' : '' }}>Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('cart') ? 'active' : '' }}" href="{{ route('cart') }}" {{ request()->routeIs('cart') ? 'aria-current=page' : '' }}>Keranjang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}" {{ request()->routeIs('admin.*') ? 'aria-current=page' : '' }}>Admin</a>
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