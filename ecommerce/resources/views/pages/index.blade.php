@extends('template.layout')

@section('title', 'Daftar Halaman')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Halaman</h1>
        <a href="{{ route('pages.create') }}" class="btn btn-primary">Tambah Halaman</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        @if ($page->status === 'published')
                            <span class="badge text-bg-success">Published</span>
                        @elseif ($page->status === 'draft')
                            <span class="badge text-bg-secondary">Draft</span>
                        @else
                            <span class="badge text-bg-dark">Archived</span>
                        @endif
                    </td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('pages.show', $page) }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="{{ route('pages.edit', $page) }}" class="btn btn-sm btn-warning">Ubah</a>
                        <form action="{{ route('pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus halaman ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada halaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $pages->links() }}
@endsection