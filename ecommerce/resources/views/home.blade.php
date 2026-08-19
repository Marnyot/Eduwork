@extends('template.layout')

@section('title', 'Beranda')

@section('content')
    <section class="hero-shell mb-5">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6">
                @auth
                    <span class="hero-eyebrow">Selamat datang kembali</span>
                    <h1 class="hero-title">Halo, {{ explode(' ', Auth::user()->name)[0] }}. Mau lihat apa hari ini?</h1>
                    <p class="hero-subtitle">Produk terbaru sudah menunggu, atau lanjut kelola katalog toko dari sini.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('products.public') }}" class="btn btn-primary btn-lg">Lihat Produk</a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-lg">Kelola Produk</a>
                    </div>
                @else
                    <span class="hero-eyebrow">Toko online kebutuhan sehari-hari</span>
                    <h1 class="hero-title">Belanja alat tulis sampai elektronik, satu tempat.</h1>
                    <p class="hero-subtitle">Eduwork punya {{ $productCount }} produk dari {{ $categoryCount }} kategori, harga jelas dari awal, tanpa perlu tanya dulu.</p>

                    <form action="{{ route('products.public') }}" method="GET" class="hero-search">
                        <label for="hero-search" class="visually-hidden">Cari produk</label>
                        <input id="hero-search" type="search" name="search" class="form-control" placeholder="Cari sepatu, buku, laptop...">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    <a href="{{ route('products.public') }}" class="fw-semibold" style="color: var(--edu-primary);">Lihat semua produk &rarr;</a>
                @endauth
            </div>

            <div class="col-lg-6">
                <div class="hero-visual">
                    <div class="hero-visual-panel">
                        <div class="hero-visual-texture"></div>
                        <div class="hero-visual-glow"></div>
                        <div class="hero-visual-mark">
                            <x-application-logo class="hero-visual-logo" />
                            <span>Eduwork Store</span>
                        </div>
                        <p class="hero-visual-tagline">Dari alat tulis sampai elektronik, satu keranjang.</p>
                    </div>
                    <div class="hero-visual-chip hero-visual-chip--products">
                        <strong>{{ $productCount }}+</strong>
                        <span>Produk aktif</span>
                    </div>
                    <div class="hero-visual-chip hero-visual-chip--categories">
                        <strong>{{ $categoryCount }}</strong>
                        <span>Kategori</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="trust-strip mb-5">
        <div class="trust-strip-item">
            <strong>Katalog terkurasi</strong>
            <span>{{ $categoryCount }} kategori, {{ $productCount }} produk, gampang dicari.</span>
        </div>
        <div class="trust-strip-item">
            <strong>Pencarian cepat</strong>
            <span>Cari produk atau kategori langsung dari halaman produk.</span>
        </div>
        <div class="trust-strip-item">
            <strong>Harga jelas</strong>
            <span>Setiap produk tampil dengan harga pasti sejak awal.</span>
        </div>
    </div>

    <section class="mb-5">
        <div class="d-flex align-items-end justify-content-between mb-4">
            <div>
                <h2 class="mb-1">Belanja per Kategori</h2>
                <p class="text-muted mb-0">Langsung loncat ke kategori yang kamu cari.</p>
            </div>
        </div>
        <div class="row g-3">
            @foreach ($categories as $category)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ route('products.public', ['search' => $category->name]) }}" class="category-tile">
                        <span class="category-tile-mark">{{ mb_strtoupper(mb_substr($category->name, 0, 1)) }}</span>
                        <span class="category-tile-name">{{ $category->name }}</span>
                        <span class="category-tile-count">{{ $category->products_count }} produk</span>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section>
        <div class="d-flex align-items-end justify-content-between mb-4">
            <div>
                <h2 class="mb-1">Produk Terbaru</h2>
                <p class="text-muted mb-0">Yang baru masuk ke katalog.</p>
            </div>
            <a href="{{ route('products.public') }}" class="fw-semibold text-nowrap" style="color: var(--edu-primary);">Lihat Semua &rarr;</a>
        </div>

        <div class="row">
            @forelse ($products as $product)
                <div class="col-6 col-md-3 mb-4 d-flex">
                    <x-product-card
                        :title="$product->name"
                        :category="$product->productCategory?->name"
                        :price="$product->price"
                        :image="$product->image"
                        :slug="$product->slug"
                    />
                </div>
            @empty
                <div class="col">
                    <p class="text-muted">Belum ada produk.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
