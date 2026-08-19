@props([
    'name' => 'image',
    'current' => null,
    'aspect' => 4 / 3,
])

<div x-data="imageCropper({ current: @js($current ? asset($current) : null), aspect: {{ $aspect }} })" x-init="init()">
    <input type="hidden" name="{{ $name }}" :value="cropped ?? ''">

    <div class="image-drop-zone" x-on:click="$refs.fileInput.click()" x-on:dragover.prevent x-on:drop.prevent="onDrop($event)">
        <template x-if="previewUrl">
            <img :src="previewUrl" class="image-drop-preview" alt="Preview gambar produk">
        </template>
        <p class="image-drop-hint" x-show="!previewUrl">Drag gambar ke sini, atau klik buat pilih file</p>
        <p class="image-drop-hint" x-show="previewUrl">Klik buat ganti gambar</p>
    </div>
    <input type="file" accept="image/*" x-ref="fileInput" class="d-none" x-on:change="onFileChange($event)">

    <div class="modal fade" x-ref="cropModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atur crop gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted small mb-2">Geser kotak buat pilih bagian yang di-crop, atau pakai gambar utuh tanpa potong.</p>
                    <div style="height: 65vh;">
                        <img x-ref="cropImage" style="display: block; max-width: 100%;" alt="Gambar untuk di-crop">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary me-sm-auto" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-secondary" x-on:click="useFullImage()">Pakai gambar utuh</button>
                    <button type="button" class="btn btn-primary" x-on:click="confirmCrop()">Crop ke {{ $aspect == 4 / 3 ? '4:3' : 'rasio ini' }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
