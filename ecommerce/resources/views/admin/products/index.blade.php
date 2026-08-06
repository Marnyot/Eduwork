@extends('template.layout')

@section('title', 'Admin - Daftar Produk')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Produk</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah Produk</a>
    </div>

    <div class="table-card">
        <table class="table align-middle mb-0 table-fixed">
            <thead>
                <tr>
                    <th style="width: 6%">ID</th>
                    <th style="width: 46%">Nama</th>
                    <th style="width: 16%">Harga</th>
                    <th style="width: 20%">Kategori</th>
                    <th class="text-center" style="width: 12%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td title="{{ $product->name }}">{{ $product->name }}</td>
                        <td>{{ number_format($product->price, 0, ',', '.') }}</td>
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
                        <td colspan="5" class="text-center">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $products->links('pagination::bootstrap-5') }}
@endsection