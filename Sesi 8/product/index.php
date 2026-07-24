<?php
    require_once '../connect.php';

    $name = trim($_GET['name'] ?? '');
    $category = trim($_GET['category'] ?? '');
    $stock = trim($_GET['stock'] ?? '');
    $price = trim($_GET['price'] ?? '');

    $where = [];
    $params = [];

    if ($name !== '') {
        $where[] = 'name LIKE :name';
        $params[':name'] = "%$name%";
    }
    if ($category !== '') {
        $where[] = 'category = :category';
        $params[':category'] = $category;
    }
    if ($stock !== '') {
        $where[] = 'stock = :stock';
        $params[':stock'] = $stock;
    }
    if ($price !== '') {
        $where[] = 'price = :price';
        $params[':price'] = $price;
    }

    $sql = "SELECT * FROM products";
    if ($where) {
        $sql .= ' WHERE ' . implode(' AND ', $where);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $categories = $pdo->query("SELECT DISTINCT category FROM products WHERE category IS NOT NULL AND category != '' ORDER BY category")
        ->fetchAll(PDO::FETCH_COLUMN);

    $totalProduk = count($products);
    $totalStok = array_sum(array_column($products, 'stock'));
    $totalKategori = count($categories);
    $stokMenipis = count(array_filter($products, fn($p) => (int) $p['stock'] <= 10));

    $isFiltered = $name !== '' || $category !== '' || $stock !== '' || $price !== '';

    $pageTitle = 'Data Produk';
    require_once '../template/header.php';
?>
<div class="page-header">
    <div class="page-header-icon"><i class="bi bi-box-seam-fill"></i></div>
    <div class="flex-grow-1">
        <h1 class="page-title">Data Produk</h1>
        <p class="page-subtitle">Kelola katalog, stok, dan harga produk toko.</p>
    </div>
    <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
</div>

<div class="stat-strip">
    <div class="stat-tile">
        <div class="stat-value"><?= $totalProduk ?></div>
        <div class="stat-label">Total Produk</div>
    </div>
    <div class="stat-tile">
        <div class="stat-value"><?= $totalStok ?></div>
        <div class="stat-label">Total Stok</div>
    </div>
    <div class="stat-tile">
        <div class="stat-value"><?= $totalKategori ?></div>
        <div class="stat-label">Kategori</div>
    </div>
    <div class="stat-tile stat-tile-warn">
        <div class="stat-value"><?= $stokMenipis ?></div>
        <div class="stat-label">Stok Menipis</div>
    </div>
</div>

<div class="toolbar-card mb-4">
    <form method="GET" class="row g-3 align-items-end">
        <div class="col-md-3">
            <label for="name" class="form-label">Nama</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" id="name" name="name" class="form-control" placeholder="Cari nama..." value="<?= htmlspecialchars($name) ?>">
            </div>
        </div>
        <div class="col-md-3">
            <label for="category" class="form-label">Kategori</label>
            <select id="category" name="category" class="form-select">
                <option value="">Semua Kategori</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= htmlspecialchars($cat) ?>" <?= $category === $cat ? 'selected' : '' ?>><?= htmlspecialchars($cat) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" id="stock" name="stock" class="form-control" placeholder="0" value="<?= htmlspecialchars($stock) ?>">
        </div>
        <div class="col-md-2">
            <label for="price" class="form-label">Harga</label>
            <input type="number" id="price" name="price" step="0.01" class="form-control" placeholder="0" value="<?= htmlspecialchars($price) ?>">
        </div>
        <div class="col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-secondary flex-fill"><i class="bi bi-funnel"></i> Filter</button>
            <a href="index.php" class="btn btn-outline-secondary <?= $isFiltered ? '' : 'disabled' ?>" title="Reset filter"><i class="bi bi-arrow-counterclockwise"></i></a>
        </div>
    </form>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table data-table">
            <thead>
                <tr>
                    <th class="d-none d-md-table-cell">ID</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th class="d-none d-lg-table-cell">Kategori</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <div class="empty-state-title">Tidak ada produk ditemukan</div>
                            <div class="empty-state-text">Coba ubah filter pencarian, atau tambah produk baru.</div>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php foreach ($products as $product):
                    $stockVal = (int) $product['stock'];
                    $stockClass = $stockVal === 0 ? 'badge-stock-out' : ($stockVal <= 10 ? 'badge-stock-low' : 'badge-stock-ok');
                ?>
                <tr>
                    <td class="text-muted-2 d-none d-md-table-cell"><?= htmlspecialchars($product['id']) ?></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img class="prod-thumb" src="../uploads/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>"
                                 onerror="this.src='https://placehold.co/48x48?text=%20'">
                            <div>
                                <div class="prod-name"><?= htmlspecialchars($product['name']) ?></div>
                                <?php if (!empty($product['description'])): ?>
                                    <div class="prod-desc"><?= htmlspecialchars(mb_strimwidth($product['description'], 0, 50, '...')) ?></div>
                                <?php endif; ?>
                                <?php if (!empty($product['category'])): ?>
                                    <span class="badge-pill badge-category d-lg-none mt-1"><?= htmlspecialchars($product['category']) ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <td class="prod-price">Rp<?= htmlspecialchars(number_format((float) $product['price'], 0, ',', '.')) ?></td>
                    <td><span class="badge-pill <?= $stockClass ?>"><span class="badge-dot"></span><?= $stockVal ?></span></td>
                    <td class="d-none d-lg-table-cell"><?php if (!empty($product['category'])): ?><span class="badge-pill badge-category"><?= htmlspecialchars($product['category']) ?></span><?php endif; ?></td>
                    <td class="text-nowrap text-end">
                        <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-secondary" title="Edit"><i class="bi bi-pencil"></i></a>
                        <a href="db_action/delete.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Hapus <?= htmlspecialchars(addslashes($product['name'])) ?>?')"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../template/footer.php'; ?>
