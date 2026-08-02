<?php
    require_once __DIR__ . '/connect.php';

    $orderId = $_GET['order_id'] ?? null;
    $order = null;
    $items = [];
    $payments = [
        'qris' => 'QRIS',
        'bank' => 'Transfer Bank',
        'cod'  => 'COD (Bayar di Tempat)',
    ];
    $waLink = '';

    if ($orderId !== null && is_numeric($orderId)) {
        $stmt = $pdo->prepare("SELECT * FROM orders WHERE id = :id");
        $stmt->execute([':id' => $orderId]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($order) {
            $stmt = $pdo->prepare("SELECT * FROM order_items WHERE order_id = :order_id");
            $stmt->execute([':order_id' => $order['id']]);
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $text = "Halo Admin, saya ingin mengkonfirmasi pesanan dengan Order ID #" . $order['id'];
            $waLink = 'https://wa.me/6281234567890?text=' . urlencode($text);
        }
    }

    $pageTitle = 'Pesanan Berhasil';
    require_once __DIR__ . '/template/header.php';
?>
<?php if (!$order): ?>
<div class="table-card">
    <div class="empty-state">
        <i class="bi bi-question-circle"></i>
        <div class="empty-state-title">Pesanan tidak ditemukan</div>
        <div class="empty-state-text">Kembali ke beranda untuk melanjutkan belanja.</div>
        <a href="index.php" class="btn btn-primary">Ke Beranda</a>
    </div>
</div>
<?php else: ?>
<div class="table-card text-center success-wrap">
    <div class="success-icon"><i class="bi bi-check-lg"></i></div>
    <h1 class="success-title">Pesanan Berhasil Dibuat</h1>
    <p class="success-subtitle">Terima kasih, <?= htmlspecialchars($order['customer_name']) ?>. Pesananmu sedang diproses.</p>

    <div class="success-meta d-flex flex-wrap justify-content-center gap-3 mb-4">
        <span class="badge-pill badge-category">Order #<?= $order['id'] ?></span>
        <span class="badge-pill badge-stock-ok"><?= date('d M Y, H:i', strtotime($order['created_at'])) ?></span>
        <span class="badge-pill badge-stock-low">Rp<?= number_format((float) $order['total'], 0, ',', '.') ?></span>
        <span class="badge-pill badge-category"><?= htmlspecialchars($payments[$order['payment_method']] ?? $order['payment_method']) ?></span>
    </div>

    <?php if (($order['payment_method'] ?? '') === 'bank'): ?>
    <div class="table-card p-4 mb-4 text-start bank-info">
        <div class="form-section-label">Instruksi Transfer Bank</div>
        <div class="bank-detail"><span>Bank</span><strong>BCA</strong></div>
        <div class="bank-detail"><span>No. Rekening</span><strong>1234 5678 9010</strong></div>
        <div class="bank-detail"><span>Atas Nama</span><strong>Toko Sesi 9</strong></div>
        <p class="bank-note mt-3 mb-0">Transfer sesuai total pesanan, lalu kirim bukti transfer ke email <strong><?= htmlspecialchars($order['customer_email']) ?></strong> atau WhatsApp <strong>081234567890</strong>.</p>
    </div>
    <?php elseif (($order['payment_method'] ?? '') === 'qris'): ?>
    <div class="table-card p-4 mb-4 text-center qris-info">
        <div class="form-section-label justify-content-center">Scan QRIS untuk Membayar</div>
        <div class="qris-box mx-auto"><i class="bi bi-qr-code"></i></div>
        <p class="bank-note mt-3 mb-0">Scan kode QRIS di atas, lalu kirim bukti pembayaran ke email <strong><?= htmlspecialchars($order['customer_email']) ?></strong>.</p>
    </div>
    <?php else: ?>
    <div class="table-card p-4 mb-4 text-center cod-info">
        <div class="form-section-label justify-content-center">Bayar di Tempat</div>
        <p class="bank-note mt-3 mb-0">Siapkan uang tunai senilai <strong>Rp<?= number_format((float) $order['total'], 0, ',', '.') ?></strong> saat pesanan tiba.</p>
    </div>
    <?php endif; ?>

    <div class="text-start table-card p-4 mb-4">
        <table class="table data-table mb-0">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-end">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['product_name']) ?></td>
                    <td class="text-center"><?= $item['quantity'] ?></td>
                    <td class="text-end prod-price">Rp<?= number_format((float) $item['subtotal'], 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-2">
        <a href="<?= $waLink ?>" target="_blank" rel="noopener" class="btn btn-success">Konfirmasi Pesanan</a>
        <a href="order/index.php" class="btn btn-secondary">Lihat Pesanan</a>
        <a href="index.php" class="btn btn-primary">Belanja Lagi</a>
    </div>
</div>
<?php endif; ?>

<?php require_once __DIR__ . '/template/footer.php'; ?>
