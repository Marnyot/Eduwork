<?php
    require_once __DIR__ . '/connect.php';

    $search = trim($_GET['search'] ?? '');
    $category = trim($_GET['category'] ?? '');
    $page = max(1, (int) ($_GET['page'] ?? 1));
    $itemsPerPage = 12;

    $where = [];
    $params = [];

    if ($search !== '') {
        $where[] = 'name LIKE :search';
        $params[':search'] = "%$search%";
    }
    if ($category !== '') {
        $where[] = 'category = :category';
        $params[':category'] = $category;
    }

    $whereSql = $where ? ' WHERE ' . implode(' AND ', $where) : '';

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM products$whereSql");
    $stmt->execute($params);
    $totalRecords = (int) $stmt->fetchColumn();
    $totalPages = max(1, (int) ceil($totalRecords / $itemsPerPage));
    if ($page > $totalPages) {
        $page = $totalPages;
    }
    $offset = ($page - 1) * $itemsPerPage;

    $sql = "SELECT * FROM products$whereSql ORDER BY created_at DESC, id DESC LIMIT $itemsPerPage OFFSET $offset";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $categories = $pdo->query("SELECT DISTINCT category FROM products WHERE category IS NOT NULL AND category != '' ORDER BY category")
        ->fetchAll(PDO::FETCH_COLUMN);

    $isFiltered = $search !== '' || $category !== '';

    $pageTitle = 'Beranda';
    require_once __DIR__ . '/template/header.php';
?>
<div class="hero">
    <div class="hero-eyebrow">Katalog Toko</div>
    <h1 class="hero-title">Temukan produk yang kamu butuhkan hari ini</h1>
    <p class="hero-subtitle">Furnitur, elektronik, dan aksesoris harian dengan stok terpantau langsung dari toko.</p>
</div>

<div class="toolbar-card mb-4">
    <form method="GET" class="row g-3 align-items-end">
        <div class="col-md-6">
            <label for="search" class="form-label">Cari Produk</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" id="search" name="search" class="form-control" placeholder="Ketik nama produk..." value="<?= htmlspecialchars($search) ?>">
            </div>
        </div>
        <div class="col-md-4">
            <label for="category" class="form-label">Kategori</label>
            <select id="category" name="category" class="form-select">
                <option value="">Semua Kategori</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= htmlspecialchars($cat) ?>" <?= $category === $cat ? 'selected' : '' ?>><?= htmlspecialchars($cat) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-secondary flex-fill"><i class="bi bi-funnel"></i> Filter</button>
            <a href="index.php" class="btn btn-outline-secondary <?= $isFiltered ? '' : 'disabled' ?>" title="Reset filter"><i class="bi bi-arrow-counterclockwise"></i></a>
        </div>
    </form>
</div>

<?php if (empty($products)): ?>
<div class="table-card">
    <div class="empty-state">
        <i class="bi bi-inbox"></i>
        <div class="empty-state-title">Tidak ada produk ditemukan</div>
        <div class="empty-state-text">Coba ubah kata kunci pencarian atau pilih kategori lain.</div>
        <a href="index.php" class="btn btn-outline-secondary">Reset Filter</a>
    </div>
</div>
<?php else: ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0" style="font-size:1.0625rem;"><?= $isFiltered ? 'Hasil pencarian' : 'Produk terbaru' ?></h2>
    <span class="text-muted-2 text-small"><?= $totalRecords ?> produk</span>
</div>
<div class="product-grid">
    <?php foreach ($products as $product):
        $stockVal = (int) $product['stock'];
        $stockClass = $stockVal === 0 ? 'badge-stock-out' : ($stockVal <= 10 ? 'badge-stock-low' : 'badge-stock-ok');
        $stockLabel = $stockVal === 0 ? 'Stok Habis' : ($stockVal <= 10 ? 'Stok Menipis' : "Stok $stockVal");
    ?>
    <div class="product-card">
        <a href="detail_product.php?id=<?= $product['id'] ?>" class="product-card-media">
            <img src="uploads/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>"
                 loading="lazy"
                 onerror="this.src='https://placehold.co/600x400?text=%20'">
        </a>
        <div class="product-card-body">
            <div class="product-card-meta">
                <?php if (!empty($product['category'])): ?>
                    <span class="badge-pill badge-category"><?= htmlspecialchars($product['category']) ?></span>
                <?php endif; ?>
                <span class="badge-pill <?= $stockClass ?>"><span class="badge-dot"></span><?= $stockLabel ?></span>
            </div>
            <a href="detail_product.php?id=<?= $product['id'] ?>" class="product-card-name"><?= htmlspecialchars($product['name']) ?></a>
            <?php if (!empty($product['description'])): ?>
                <div class="product-card-desc"><?= htmlspecialchars(mb_strimwidth($product['description'], 0, 70, '...')) ?></div>
            <?php endif; ?>
            <div class="product-card-price">Rp<?= number_format((float) $product['price'], 0, ',', '.') ?></div>
            <a href="detail_product.php?id=<?= $product['id'] ?>" class="btn btn-primary w-100">Lihat Detail</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php if ($totalPages > 1): ?>
<nav aria-label="Pagination" class="mt-4">
    <ul class="pagination justify-content-center">
        <?php
            $qs = fn($p) => 'index.php?page=' . $p . '&search=' . urlencode($search) . '&category=' . urlencode($category);
            $startPage = max(1, $page - 2);
            $endPage = min($totalPages, $page + 2);
        ?>
        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $qs($page - 1) ?>">&laquo;</a>
        </li>
        <?php if ($startPage > 1): ?>
            <li class="page-item"><a class="page-link" href="<?= $qs(1) ?>">1</a></li>
            <?php if ($startPage > 2): ?><li class="page-item disabled"><span class="page-link">...</span></li><?php endif; ?>
        <?php endif; ?>
        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
            <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                <?php if ($i === $page): ?>
                    <span class="page-link"><?= $i ?></span>
                <?php else: ?>
                    <a class="page-link" href="<?= $qs($i) ?>"><?= $i ?></a>
                <?php endif; ?>
            </li>
        <?php endfor; ?>
        <?php if ($endPage < $totalPages): ?>
            <?php if ($endPage < $totalPages - 1): ?><li class="page-item disabled"><span class="page-link">...</span></li><?php endif; ?>
            <li class="page-item"><a class="page-link" href="<?= $qs($totalPages) ?>"><?= $totalPages ?></a></li>
        <?php endif; ?>
        <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $qs($page + 1) ?>">&raquo;</a>
        </li>
    </ul>
    <div class="pagination-meta">Halaman <?= $page ?> dari <?= $totalPages ?> · <?= $totalRecords ?> produk</div>
</nav>
<?php endif; ?>
<?php endif; ?>

<?php require_once __DIR__ . '/template/footer.php'; ?>
