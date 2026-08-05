@extends('template.layout')

@section('title', 'Admin - Detail Produk')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="btn btn-link px-0">&larr; Kembali</a>
        <h1>{{ $product->name }}</h1>
    </div>

    <table class="table w-50">
        <tr><th>ID</th><td>{{ $product->id }}</td></tr>
        <tr><th>Nama</th><td>{{ $product->name }}</td></tr>
        <tr><th>Harga</th><td>{{ number_format($product->price, 0, ',', '.') }}</td></tr>
        <tr><th>Kategori</th><td>{{ $product->category?->name ?? '-' }}</td></tr>
        <tr><th>Dibuat</th><td>{{ $product->created_at }}</td></tr>
        <tr><th>Diperbarui</th><td>{{ $product->updated_at }}</td></tr>
    </table>

    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Ubah</a>
@endsection