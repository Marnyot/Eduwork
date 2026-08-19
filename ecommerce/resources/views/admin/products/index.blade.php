@extends('admin.layout')

@section('title', 'Admin - Daftar Produk')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <h1 class="mb-0">Daftar Produk</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah Produk</a>
    </div>

    <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex flex-wrap gap-2 mb-4 w-100">
        <div class="search-form" style="max-width: 420px;">
            <div class="input-group">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </span>
                <input type="search" name="search" class="form-control" placeholder="Cari nama atau kategori..." value="{{ request('search') }}" autocomplete="off">
                @if (request('search'))
                    <a href="{{ route('admin.products.index', request()->except('search')) }}" class="input-group-text text-decoration-none clear-search" title="Hapus pencarian">&times;</a>
                @endif
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>

        <select name="sort" class="form-select ms-auto" style="max-width: 220px;" onchange="this.form.submit()">
            <option value="id_asc" {{ request('sort', 'id_asc') == 'id_asc' ? 'selected' : '' }}>No. urut</option>
            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama A-Z</option>
            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama Z-A</option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga terendah</option>
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga tertinggi</option>
            <option value="stock_asc" {{ request('sort') == 'stock_asc' ? 'selected' : '' }}>Stok terendah</option>
            <option value="stock_desc" {{ request('sort') == 'stock_desc' ? 'selected' : '' }}>Stok tertinggi</option>
        </select>
    </form>

    @if (request('search'))
        <span class="search-result-info d-inline-block mb-4">
            {{ $products->total() }} produk ditemukan untuk
            &ldquo;<strong>{{ request('search') }}</strong>&rdquo;
        </span>
    @endif

    <div class="table-card">
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-fixed">
            <thead>
                <tr>
                    <th style="width: 60px">ID</th>
                    <th style="width: 72px">Gambar</th>
                    <th style="width: 190px">Nama</th>
                    <th style="width: 220px">Deskripsi</th>
                    <th style="width: 120px">Harga</th>
                    <th style="width: 80px">Stok</th>
                    <th style="width: 140px">Kategori</th>
                    <th style="width: 250px" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="40" height="40" style="object-fit: cover; border-radius: var(--edu-radius-sm);">
                        </td>
                        <td title="{{ $product->name }}">{{ $product->name }}</td>
                        <td title="{{ $product->description }}">{{ $product->description }}</td>
                        <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->productCategory?->name ?? '-' }}</td>
                        <td class="action-cell">
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-info">Lihat</a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Ubah</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            @if (request('search'))
                                Tidak ada produk yang cocok dengan pencarianmu.
                            @else
                                Belum ada produk.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>

    {{ $products->links('pagination::bootstrap-5') }}
@endsection
