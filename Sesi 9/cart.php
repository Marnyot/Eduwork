<?php
    require_once __DIR__ . '/connect.php';

    $action = $_GET['action'] ?? '';
    $productId = $_GET['id'] ?? null;

    if ($action === 'add' && $productId !== null && is_numeric($productId)) {
        $id = (int) $productId;
        $stmt = $pdo->prepare("SELECT id, stock FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            $qty = isset($_GET['qty']) ? max(1, (int) $_GET['qty']) : 1;
            $current = $_SESSION['cart'][$id] ?? 0;
            $qty = min($qty, (int) $product['stock']);
            if ($qty > 0) {
                $_SESSION['cart'][$id] = min($current + $qty, (int) $product['stock']);
            }
        }
        header('Location: cart.php');
        exit();
    }

    if ($action === 'update' && $productId !== null && is_numeric($productId)) {
        $id = (int) $productId;
        $qty = max(0, (int) ($_GET['qty'] ?? 0));
        $stmt = $pdo->prepare("SELECT stock FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            if ($qty === 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                $_SESSION['cart'][$id] = min($qty, (int) $product['stock']);
            }
        }
        header('Location: cart.php');
        exit();
    }

    if ($action === 'remove' && $productId !== null && is_numeric($productId)) {
        unset($_SESSION['cart'][(int) $productId]);
        header('Location: cart.php');
        exit();
    }

    $cart = cart_get();
    $items = [];

    if ($cart) {
        $ids = array_map('intval', array_keys($cart));
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
        $stmt->execute($ids);
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $product) {
            $product['qty'] = $cart[$product['id']];
            $product['subtotal'] = (float) $product['price'] * $product['qty'];
            $items[] = $product;
        }
    }

    $total = array_sum(array_column($items, 'subtotal'));

    $pageTitle = 'Keranjang';
    require_once __DIR__ . '/template/header.php';
?>
<div class="page-header">
    <div class="page-header-heading">
        <h1 class="page-title">Keranjang Belanja</h1>
        <p class="page-subtitle"><?= count($items) ?> produk dalam keranjang.</p>
    </div>
</div>

<?php if (empty($items)): ?>
<div class="table-card">
    <div class="empty-state">
        <i class="bi bi-cart-x"></i>
        <div class="empty-state-title">Keranjang masih kosong</div>
        <div class="empty-state-text">Yuk cari produk favoritmu di beranda toko.</div>
        <a href="index.php" class="btn btn-primary">Belanja Sekarang</a>
    </div>
</div>
<?php else: ?>
<div class="table-card mb-4">
    <div class="table-responsive">
        <table class="table data-table align-middle">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center" style="width:140px">Jumlah</th>
                    <th class="text-end">Subtotal</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item):
                    $stockVal = (int) $item['stock'];
                    $stockLabel = $stockVal === 0 ? 'Stok Habis' : "Stok $stockVal";
                ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img class="prod-thumb" src="uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>"
                                 onerror="this.src='https://placehold.co/48x48?text=%20'">
                            <div>
                                <div class="prod-name"><?= htmlspecialchars($item['name']) ?></div>
                                <span class="text-muted-2 small"><?= $stockLabel ?></span>
                            </div>
                        </div>
                    </td>
                    <td class="text-center prod-price">Rp<?= number_format((float) $item['price'], 0, ',', '.') ?></td>
                    <td class="text-center">
                        <div class="input-group input-group-sm justify-content-center qty-input">
                            <a class="btn btn-outline-secondary" href="cart.php?action=update&id=<?= $item['id'] ?>&qty=<?= $item['qty'] - 1 ?>" title="Kurangi"><i class="bi bi-dash"></i></a>
                            <input type="number" class="form-control text-center" value="<?= $item['qty'] ?>" min="1" max="<?= $stockVal ?>"
                                   onchange="location.href='cart.php?action=update&id=<?= $item['id'] ?>&qty='+this.value">
                            <a class="btn btn-outline-secondary" href="cart.php?action=update&id=<?= $item['id'] ?>&qty=<?= $item['qty'] + 1 ?>" title="Tambah"><i class="bi bi-plus"></i></a>
                        </div>
                    </td>
                    <td class="text-end prod-price">Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                    <td class="text-end">
                        <a href="cart.php?action=remove&id=<?= $item['id'] ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Hapus <?= htmlspecialchars(addslashes($item['name'])) ?> dari keranjang?')"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row g-4 justify-content-end">
    <div class="col-md-5 col-lg-4">
        <div class="table-card summary-card">
            <div class="summary-line">
                <span class="summary-label">Subtotal</span>
                <span class="summary-value">Rp<?= number_format($total, 0, ',', '.') ?></span>
            </div>
            <hr class="form-divider">
            <div class="summary-line summary-total mb-3">
                <span class="summary-label fw-semibold text-dark">Total</span>
                <span class="summary-value">Rp<?= number_format($total, 0, ',', '.') ?></span>
            </div>
            <a href="checkout.php" class="btn btn-primary w-100 btn-lg">Checkout</a>
            <a href="index.php" class="btn btn-outline-secondary w-100 mt-2">Kembali Belanja</a>
        </div>
    </div>
</div>
<?php endif; ?>

<?php require_once __DIR__ . '/template/footer.php'; ?>
