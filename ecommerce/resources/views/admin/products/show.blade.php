@extends('admin.layout')

@section('title', 'Admin - Detail Produk')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="btn btn-link px-0">&larr; Kembali</a>
        <h1>{{ $product->name }}</h1>
    </div>

    <div class="row g-4">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset($product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="table-card">
                <table class="table mb-0">
                <tr><th>ID</th><td>{{ $product->id }}</td></tr>
                <tr><th>Nama</th><td>{{ $product->name }}</td></tr>
                <tr><th>Harga</th><td>{{ number_format($product->price, 0, ',', '.') }}</td></tr>
                <tr><th>Stok</th><td>{{ $product->stock }}</td></tr>
                <tr><th>Kategori</th><td>{{ $product->productCategory?->name ?? '-' }}</td></tr>
                <tr><th>Deskripsi</th><td>{{ $product->description ?: '-' }}</td></tr>
                <tr><th>Dibuat</th><td>{{ $product->created_at }}</td></tr>
                <tr><th>Diperbarui</th><td>{{ $product->updated_at }}</td></tr>
            </table>
            </div>

            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning mt-3">Ubah</a>
        </div>
    </div>
@endsection