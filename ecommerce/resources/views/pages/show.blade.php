@extends('template.layout')

@section('title', 'Detail Halaman')

@section('content')
    <div class="mb-4">
        <a href="{{ route('pages.index') }}" class="btn btn-link px-0">&larr; Kembali</a>
        <h1>{{ $page->title }}</h1>
    </div>

    <p class="text-muted">
        Slug: <code>{{ $page->slug }}</code> &middot; Status: {{ $page->status }}
    </p>

    <div class="border rounded p-3 mb-4">
        {!! nl2br(e($page->content)) !!}
    </div>

    <a href="{{ route('pages.edit', $page) }}" class="btn btn-warning">Ubah</a>
@endsection