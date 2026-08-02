<?php
    require_once __DIR__ . '/connect.php';

    $cart = cart_get();
    if (empty($cart)) {
        header('Location: cart.php');
        exit();
    }

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

    $pageTitle = 'Checkout';
    require_once __DIR__ . '/template/header.php';
?>
<div class="page-header">
    <div class="page-header-heading">
        <h1 class="page-title">Checkout</h1>
        <p class="page-subtitle">Lengkapi data pengiriman untuk menyelesaikan pesanan.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="form-card">
            <form action="process_checkout.php" method="POST">
                <div class="form-section-label"><i class="bi bi-person"></i> Data Pembeli</div>
                <div class="mb-3">
                    <label for="customer_name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" maxlength="100" required placeholder="mis. Budi Santoso">
                </div>
                <div class="mb-3">
                    <label for="customer_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="customer_email" name="customer_email" maxlength="100" required placeholder="mis. budi@email.com">
                </div>
                <div class="mb-3">
                    <label for="customer_phone" class="form-label">No. HP</label>
                    <input type="tel" class="form-control" id="customer_phone" name="customer_phone" maxlength="20" required placeholder="mis. 081234567890">
                </div>
                <div class="mb-3">
                    <label for="customer_address" class="form-label">Alamat Pengiriman</label>
                    <textarea class="form-control" id="customer_address" name="customer_address" rows="4" required placeholder="Nama jalan, nomor rumah, kecamatan, kota, kode pos"></textarea>
                </div>

                <hr class="form-divider">
                <div class="form-section-label">Metode Pembayaran</div>
                <?php $payments = [
                    'qris'   => ['QRIS', 'Scan sekali, bayar langsung lewat aplikasi e-wallet atau m-banking.'],
                    'bank'   => ['Transfer Bank', 'Transfer ke rekening bank lalu konfirmasi pembayaran.'],
                    'cod'    => ['COD (Bayar di Tempat)', 'Bayar tunai saat pesanan sampai di alamatmu.'],
                ]; ?>
                <div class="payment-methods mb-3">
                    <?php foreach ($payments as $key => $pm): ?>
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="<?= $key ?>" <?= $key === 'qris' ? 'checked' : '' ?> required>
                            <div class="payment-option-body">
                                <span class="payment-option-title"><?= $pm[0] ?></span>
                                <span class="payment-option-desc"><?= $pm[1] ?></span>
                            </div>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="d-flex gap-2 mt-2">
                    <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                    <a href="cart.php" class="btn btn-outline-secondary">Kembali ke Keranjang</a>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="table-card summary-card">
            <div class="form-section-label"><i class="bi bi-receipt"></i> Ringkasan Pesanan</div>
            <?php foreach ($items as $item): ?>
                <div class="summary-line">
                    <span class="summary-label"><?= htmlspecialchars($item['name']) ?> × <?= $item['qty'] ?></span>
                    <span class="summary-value">Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></span>
                </div>
            <?php endforeach; ?>
            <hr class="form-divider">
            <div class="summary-line summary-total mb-0">
                <span class="summary-label fw-semibold text-dark">Total</span>
                <span class="summary-value">Rp<?= number_format($total, 0, ',', '.') ?></span>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/template/footer.php'; ?>
