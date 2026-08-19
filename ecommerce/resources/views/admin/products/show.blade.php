@extends('template.layout')

@section('title', 'Admin - Detail Produk')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="btn btn-link px-0">&larr; Kembali</a>
        <h1>{{ $product->name }}</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-details">
        <tr><th>ID</th><td>{{ $product->id }}</td></tr>
        <tr><th>Nama</th><td>{{ $product->name }}</td></tr>
        <tr><th>Harga</th><td>{{ number_format($product->price, 0, ',', '.') }}</td></tr>
        <tr><th>Kategori</th><td>{{ $product->productCategory?->name ?? '-' }}</td></tr>
        <tr><th>Dibuat</th><td>{{ $product->created_at }}</td></tr>
        <tr><th>Diperbarui</th><td>{{ $product->updated_at }}</td></tr>
    </table>
    </div>

    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Ubah</a>
@endsection