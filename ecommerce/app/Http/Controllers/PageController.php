<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Menampilkan daftar semua halaman (READ - list).
     */
    public function index(): View
    {
        $pages = Page::query()
            ->orderByDesc('id')
            ->paginate(10);

        return view('pages.index', compact('pages'));
    }

    /**
     * Menampilkan form untuk membuat halaman baru.
     */
    public function create(): View
    {
        return view('pages.create');
    }

    /**
     * Menyimpan halaman baru ke database (CREATE).
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', 'unique:pages,slug'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published,archived'],
        ]);

        Page::create($data);

        return redirect()
            ->route('pages.index')
            ->with('success', 'Halaman berhasil dibuat.');
    }

    /**
     * Menampilkan detail satu halaman (READ - detail).
     * 404 otomatis dikembalikan bila halaman tidak ditemukan.
     */
    public function show(Page $page): View
    {
        return view('pages.show', compact('page'));
    }

    /**
     * Menampilkan form untuk mengubah halaman yang sudah ada.
     */
    public function edit(Page $page): View
    {
        return view('pages.edit', compact('page'));
    }

    /**
     * Memperbarui data halaman yang sudah ada (UPDATE).
     */
    public function update(Request $request, Page $page): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required', 'string', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'unique:pages,slug,'.$page->id,
            ],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published,archived'],
        ]);

        $page->update($data);

        return redirect()
            ->route('pages.index')
            ->with('success', 'Halaman berhasil diperbarui.');
    }

    /**
     * Menghapus halaman dari database (DELETE).
     */
    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()
            ->route('pages.index')
            ->with('success', 'Halaman berhasil dihapus.');
    }
}
