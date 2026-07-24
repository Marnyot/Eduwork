<?php $current = basename($_SERVER['SCRIPT_NAME']); ?>
<nav class="navbar navbar-expand-lg app-nav sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <span class="brand-mark"><i class="bi bi-box-seam-fill"></i></span>
            <span class="brand-text">Manajemen Produk</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#appNavCollapse" aria-controls="appNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="appNavCollapse">
            <div class="navbar-nav ms-auto">
                <a class="nav-link <?= $current === 'index.php' ? 'active' : '' ?>" href="index.php">Data Produk</a>
                <a class="nav-link <?= $current === 'create.php' ? 'active' : '' ?>" href="create.php">Tambah Produk</a>
            </div>
        </div>
    </div>
</nav>
