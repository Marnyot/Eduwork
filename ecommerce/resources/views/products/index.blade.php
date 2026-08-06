@extends('template.layout')

@section('title', 'Daftar Produk')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Produk</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
    </div>

    <div class="table-card">
        <table class="table align-middle mb-0 table-fixed">
            <thead>
                <tr>
                    <th style="width: 8%">ID</th>
                    <th style="width: 58%">Nama</th>
                    <th style="width: 16%">Harga</th>
                    <th class="text-center" style="width: 18%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td title="{{ $product->name }}">{{ $product->name }}</td>
                        <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="action-cell">
                            <div class="d-flex gap-2">
                                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-info">Lihat</a>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Ubah</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $products->links('pagination::bootstrap-5') }}
@endsection