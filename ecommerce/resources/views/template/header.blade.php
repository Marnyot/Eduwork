<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Eduwork</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pages.index') }}">Halaman</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.products.index') }}">Admin</a></li>
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