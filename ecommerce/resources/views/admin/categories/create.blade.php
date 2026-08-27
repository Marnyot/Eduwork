@extends('admin.layout')

@section('title', 'Admin - Tambah Kategori')

@section('content')
    <h1 class="mb-4">Tambah Kategori</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="w-50">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug <span class="text-muted fw-normal">(opsional)</span></label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                   value="{{ old('slug') }}" placeholder="Kosongkan untuk generate otomatis dari nama">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection