@extends('template.layout')

@section('title', 'Admin - Daftar Kategori')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Kategori</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
    </div>

    <div class="table-card">
        <table class="table align-middle mb-0 table-fixed">
            <thead>
                <tr>
                    <th style="width: 8%">ID</th>
                    <th style="width: 40%">Nama</th>
                    <th style="width: 32%">Slug</th>
                    <th class="text-center" style="width: 20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td title="{{ $category->name }}">{{ $category->name }}</td>
                        <td title="{{ $category->slug }}">{{ $category->slug }}</td>
                        <td class="action-cell">
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">Ubah</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $categories->links('pagination::bootstrap-5') }}
@endsection