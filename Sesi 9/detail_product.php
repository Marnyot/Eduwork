<?php
    require_once __DIR__ . '/connect.php';

    $id = $_GET['id'] ?? null;
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        header('Location: index.php');
        exit();
    }

    $pageTitle = $product['name'];

    $stockVal = (int) $product['stock'];
    $stockClass = $stockVal === 0 ? 'badge-stock-out' : ($stockVal <= 10 ? 'badge-stock-low' : 'badge-stock-ok');
    $stockLabel = $stockVal === 0 ? 'Stok Habis' : ($stockVal <= 10 ? 'Stok Menipis' : "Stok $stockVal");

    require_once __DIR__ . '/template/header.php';
?>
<div class="detail-wrap">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
            <?php if (!empty($product['category'])): ?>
                <li class="breadcrumb-item"><a href="index.php?category=<?= urlencode($product['category']) ?>"><?= htmlspecialchars($product['category']) ?></a></li>
            <?php endif; ?>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars(mb_strimwidth($product['name'], 0, 40, '...')) ?></li>
        </ol>
    </nav>

    <div class="table-card p-0">
        <div class="row g-0 detail-row">
            <div class="col-md-5 detail-media-col">
                <img class="detail-media" src="uploads/<?= htmlspecialchars($product['image']) ?>"
                     alt="<?= htmlspecialchars($product['name']) ?>"
                     onerror="this.src='https://placehold.co/600x600?text=%20'">
            </div>
            <div class="col-md-7 detail-info">
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <?php if (!empty($product['category'])): ?>
                        <span class="badge-pill badge-category"><?= htmlspecialchars($product['category']) ?></span>
                    <?php endif; ?>
                    <span class="badge-pill <?= $stockClass ?>"><span class="badge-dot"></span><?= $stockLabel ?></span>
                </div>

                <h1 class="detail-title"><?= htmlspecialchars($product['name']) ?></h1>
                <div class="detail-price mb-3">Rp<?= number_format((float) $product['price'], 0, ',', '.') ?></div>

                <hr class="form-divider">

                <h2 class="detail-section-title">Deskripsi</h2>
                <p class="detail-desc"><?= nl2br(htmlspecialchars($product['description'])) ?></p>

                <div class="detail-actions d-flex flex-wrap align-items-center gap-2 mt-4">
                    <?php if ($stockVal === 0): ?>
                        <button type="button" class="btn btn-secondary btn-lg" disabled>Stok Habis</button>
                    <?php else: ?>
                        <div class="input-group detail-qty">
                            <span class="input-group-text">Jumlah</span>
                            <input type="number" class="form-control" id="detailQty" value="1" min="1" max="<?= $stockVal ?>">
                        </div>
                        <a href="cart.php?action=add&id=<?= $product['id'] ?>&qty=1" class="btn btn-primary btn-lg" id="addToCartBtn">Tambah ke Keranjang</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const qtyInput = document.getElementById('detailQty');
    const addBtn = document.getElementById('addToCartBtn');
    if (qtyInput && addBtn) {
        const base = addBtn.getAttribute('href').replace(/&qty=\d+/, '');
        const update = () => {
            let v = parseInt(qtyInput.value, 10) || 1;
            const max = parseInt(qtyInput.max, 10) || 1;
            v = Math.max(1, Math.min(v, max));
            qtyInput.value = v;
            addBtn.setAttribute('href', base + '&qty=' + v);
        };
        qtyInput.addEventListener('input', update);
        qtyInput.addEventListener('change', update);
    }
</script>
<?php require_once __DIR__ . '/template/footer.php'; ?>
