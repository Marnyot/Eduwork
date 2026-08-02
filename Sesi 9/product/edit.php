<?php
    require_once '../connect.php';

    $id = $_GET['id'] ?? null;
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        header('Location: index.php');
        exit();
    }

    $pageTitle = 'Edit Produk';
    require_once '../template/header.php';
?>
<div class="page-header">
    <div class="page-header-heading">
        <h1 class="page-title">Edit Produk</h1>
        <p class="page-subtitle">Perbarui detail <?= htmlspecialchars($product['name']) ?>.</p>
    </div>
    <div class="page-header-actions">
        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
    </div>
</div>

<div class="form-card">
    <form action="db_action/update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
        <input type="hidden" name="old_image" value="<?= htmlspecialchars($product['image']) ?>">

        <div class="row g-4">
            <div class="col-md-4">
                <div class="form-section-label"><i class="bi bi-image"></i> Foto</div>
                <label for="image" class="image-drop">
                    <img id="imagePreview" class="image-drop-preview <?= empty($product['image']) ? 'd-none' : '' ?>"
                         src="<?= !empty($product['image']) ? '../uploads/' . htmlspecialchars($product['image']) : '' ?>" alt="Pratinjau gambar">
                    <span id="imageDropHint" class="image-drop-hint <?= !empty($product['image']) ? 'd-none' : '' ?>">
                        <i class="bi bi-cloud-arrow-up"></i>
                        <span>Klik untuk unggah</span>
                        <small>JPG, PNG, GIF - maks. 2MB</small>
                    </span>
                </label>
                <input type="file" class="d-none" id="image" name="image" accept="image/jpeg,image/png,image/gif">
                <div class="form-text">Biarkan kosong kalau tidak ingin ganti gambar.</div>
            </div>

            <div class="col-md-8">
                <div class="form-section-label"><i class="bi bi-card-text"></i> Informasi Produk</div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" maxlength="150" value="<?= htmlspecialchars($product['name']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($product['description']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="category" name="category" value="<?= htmlspecialchars($product['category']) ?>">
                </div>

                <hr class="form-divider">

                <div class="form-section-label"><i class="bi bi-tag"></i> Harga &amp; Stok</div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="price" class="form-label">Harga (Rp)</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" value="<?= htmlspecialchars($product['price']) ?>" required>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="stock" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stock" name="stock" min="0" value="<?= htmlspecialchars($product['stock']) ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mt-2">
            <button type="submit" class="btn btn-primary">Update Produk</button>
            <a href="index.php" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>

<script src="../assets/image-preview.js"></script>

<?php require_once '../template/footer.php'; ?>
