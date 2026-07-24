<?php
    $pageTitle = 'Tambah Produk';
    require_once '../template/header.php';
?>
<div class="page-header">
    <div class="page-header-icon"><i class="bi bi-plus-lg"></i></div>
    <div class="flex-grow-1">
        <h1 class="page-title">Tambah Produk</h1>
        <p class="page-subtitle">Lengkapi detail produk baru untuk katalog.</p>
    </div>
</div>

<div class="form-card">
    <form action="db_action/insert.php" method="POST" enctype="multipart/form-data">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="form-section-label"><i class="bi bi-image"></i> Foto</div>
                <label for="image" class="image-drop">
                    <img id="imagePreview" class="image-drop-preview d-none" alt="Pratinjau gambar">
                    <span id="imageDropHint" class="image-drop-hint">
                        <i class="bi bi-cloud-arrow-up"></i>
                        <span>Klik untuk unggah</span>
                        <small>JPG, PNG, GIF - maks. 2MB</small>
                    </span>
                </label>
                <input type="file" class="d-none" id="image" name="image" accept="image/jpeg,image/png,image/gif">
            </div>

            <div class="col-md-8">
                <div class="form-section-label"><i class="bi bi-card-text"></i> Informasi Produk</div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" maxlength="150" placeholder="mis. Kursi Kerja Ergonomis" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Ringkas dan jelas, maks. beberapa kalimat"></textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="category" name="category" placeholder="mis. Furnitur">
                </div>

                <hr class="form-divider">

                <div class="form-section-label"><i class="bi bi-tag"></i> Harga &amp; Stok</div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="price" class="form-label">Harga (Rp)</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" required>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="stock" class="form-label">Stok Awal</label>
                        <input type="number" class="form-control" id="stock" name="stock" min="0" value="0">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mt-2">
            <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Simpan Produk</button>
            <a href="index.php" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>

<script src="../assets/image-preview.js"></script>

<?php require_once '../template/footer.php'; ?>
