<?php
    $current = basename($_SERVER['SCRIPT_NAME']);
    $dir = basename(dirname($_SERVER['SCRIPT_NAME']));
    $cartCount = 0;
    if (isset($_SESSION['cart'])) {
        $cartCount = array_sum($_SESSION['cart']);
    }
?>
<nav class="navbar navbar-expand-lg app-nav sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL ?>/index.php">
            <span class="brand-mark"><i class="bi bi-shop"></i></span>
            <span class="brand-text">Toko Sesi 9</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#appNavCollapse" aria-controls="appNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="appNavCollapse">
            <div class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <a class="nav-link <?= $dir === 'Sesi9' && $current === 'index.php' ? 'active' : '' ?>" href="<?= BASE_URL ?>/index.php"><i class="bi bi-house"></i> Beranda</a>
                <a class="nav-link <?= $current === 'cart.php' ? 'active' : '' ?>" href="<?= BASE_URL ?>/cart.php">
                    <i class="bi bi-cart3"></i> Keranjang
                    <?php if ($cartCount > 0): ?><span class="cart-badge"><?= $cartCount ?></span><?php endif; ?>
                </a>
            </div>
        </div>
    </div>
</nav>
