@extends('admin.layout')

@section('title', 'Admin - Ubah Produk')

@section('content')
    <h1 class="mb-4">Ubah Produk</h1>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" class="w-50">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $product->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug <span class="text-muted fw-normal">(opsional)</span></label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                   value="{{ old('slug', $product->slug) }}" placeholder="Kosongkan untuk generate otomatis dari nama">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <x-image-upload-cropper name="image" :current="$product->image" required />
            @error('image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col mb-3">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" name="stock" id="stock" min="0" class="form-control @error('stock') is-invalid @enderror"
                       value="{{ old('stock', $product->stock) }}">
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" name="price" id="price" min="0" class="form-control @error('price') is-invalid @enderror"
                       value="{{ old('price', $product->price) }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="product_category_id" class="form-label">Kategori</label>
            <select name="product_category_id" id="product_category_id" class="form-select @error('product_category_id') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('product_category_id', $product->product_category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('product_category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
