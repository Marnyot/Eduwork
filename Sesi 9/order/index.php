<?php
    require_once __DIR__ . '/../connect.php';

    $search = trim($_GET['search'] ?? '');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_status') {
        $order_id = (int) ($_POST['order_id'] ?? 0);
        $status = trim($_POST['status'] ?? '');
        if ($order_id > 0 && in_array($status, ['pending', 'completed', 'cancelled'], true)) {
            $stmt = $pdo->prepare("UPDATE orders SET status = :status WHERE id = :id");
            $stmt->execute([':status' => $status, ':id' => $order_id]);
        }
        header('Location: index.php' . ($search !== '' ? '?search=' . urlencode($search) : ''));
        exit();
    }

    $sql = "SELECT * FROM orders WHERE 1=1";
    $params = [];
    if ($search !== '') {
        $sql .= " AND customer_name LIKE :search";
        $params[':search'] = "%$search%";
    }
    $sql .= " ORDER BY created_at DESC, id DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $payments = [
        'qris' => 'QRIS',
        'bank' => 'Transfer Bank',
        'cod'  => 'COD',
    ];
    $statuses = [
        'pending'   => 'Pending',
        'completed' => 'Selesai',
        'cancelled' => 'Dibatalkan',
    ];

    $pageTitle = 'Data Pesanan';
    require_once __DIR__ . '/../template/header.php';
?>
<div class="page-header">
    <div class="page-header-heading">
        <h1 class="page-title">Data Pesanan</h1>
        <p class="page-subtitle">Daftar transaksi dari toko.</p>
    </div>
    <div class="page-header-actions">
        <a href="<?= BASE_URL ?>/index.php" class="btn btn-outline-secondary"><i class="bi bi-shop"></i> Ke Toko</a>
    </div>
</div>

<div class="toolbar-card mb-4">
    <form method="GET" class="row g-3 align-items-end">
        <div class="col-md-6">
            <label for="search" class="form-label">Cari Pelanggan</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" id="search" name="search" class="form-control" placeholder="Ketik nama pelanggan..." value="<?= htmlspecialchars($search) ?>">
            </div>
        </div>
        <div class="col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-secondary flex-fill"><i class="bi bi-funnel"></i> Cari</button>
            <a href="index.php" class="btn btn-outline-secondary <?= $search !== '' ? '' : 'disabled' ?>" title="Reset"><i class="bi bi-arrow-counterclockwise"></i></a>
        </div>
    </form>
</div>

<?php if (empty($orders)): ?>
<div class="table-card">
    <div class="empty-state">
        <i class="bi bi-receipt-cutoff"></i>
        <div class="empty-state-title"><?= $search !== '' ? 'Pesanan tidak ditemukan' : 'Belum ada pesanan' ?></div>
        <div class="empty-state-text"><?= $search !== '' ? 'Coba kata kunci lain.' : 'Pesanan yang dibuat pelanggan akan muncul di sini.' ?></div>
    </div>
</div>
<?php else: ?>
<div class="table-card">
    <div class="table-responsive">
        <table class="table data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Pembayaran</th>
                    <th class="text-end">Total</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order):
                    $itemCount = $pdo->prepare("SELECT SUM(quantity) FROM order_items WHERE order_id = :id");
                    $itemCount->execute([':id' => $order['id']]);
                    $qty = (int) $itemCount->fetchColumn();
                ?>
                <tr class="clickable-row" data-href="<?= BASE_URL ?>/success.php?order_id=<?= $order['id'] ?>">
                    <td class="text-muted-2">#<?= $order['id'] ?></td>
                    <td>
                        <div class="prod-name"><?= htmlspecialchars($order['customer_name']) ?></div>
                        <span class="text-muted-2 small"><?= $qty ?> item</span>
                    </td>
                    <td><?= htmlspecialchars($order['customer_phone']) ?>
                        <div class="text-muted-2 small"><?= htmlspecialchars($order['customer_email']) ?></div>
                    </td>
                    <td>
                        <span class="badge-pill badge-category"><?= htmlspecialchars($payments[$order['payment_method']] ?? $order['payment_method']) ?></span>
                        <span class="badge-pill <?= $order['payment_status'] === 'paid' ? 'badge-stock-ok' : 'badge-stock-low' ?>"><?= $order['payment_status'] === 'paid' ? 'Lunas' : 'Menunggu' ?></span>
                    </td>
                    <td class="text-end prod-price">Rp<?= number_format((float) $order['total'], 0, ',', '.') ?></td>
                    <td class="text-muted-2 small"><?= date('d M Y H:i', strtotime($order['created_at'])) ?></td>
                    <td>
                        <form method="POST" class="d-inline" action="index.php">
                            <input type="hidden" name="action" value="update_status">
                            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                            <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">
                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                <?php foreach ($statuses as $val => $label): ?>
                                    <option value="<?= $val ?>" <?= $order['status'] === $val ? 'selected' : '' ?>><?= $label ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </td>
                    <td class="text-end text-nowrap">
                        <a href="delete.php?id=<?= $order['id'] ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Hapus pesanan #<?= $order['id'] ?>?')"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>

<?php require_once __DIR__ . '/../template/footer.php'; ?>

<script>
    document.querySelectorAll('tr.clickable-row').forEach(function (row) {
        row.addEventListener('click', function (e) {
            if (e.target.closest('a, button, select, form')) {
                return;
            }
            window.location.href = row.dataset.href;
        });
    });
</script>
