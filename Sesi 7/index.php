<?php
session_start();
require_once 'config.php';

$success = $_SESSION['success'] ?? null;
$errors  = $_SESSION['errors']  ?? [];
$old     = $_SESSION['old']     ?? [];

unset($_SESSION['success'], $_SESSION['errors'], $_SESSION['old']);

$products = [];
$dbError  = null;

try {
    $products = db()->query('SELECT * FROM products ORDER BY id DESC')->fetchAll();
} catch (PDOException $e) {
    $dbError = 'Tidak dapat terhubung ke database. Pastikan server database aktif.';
}

function oldVal(array $old, string $key, string $default = ''): string
{
    return h((string) ($old[$key] ?? $default));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Input Data Produk — Sesi 7</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<nav class="site-nav">
  <div class="container">
    <a href="index.php" class="nav-brand">Manajemen Produk</a>
    <ul class="nav-links">
      <li><a href="#form-section">Tambah Produk</a></li>
      <li><a href="#table-section">Data Produk (<?= count($products) ?>)</a></li>
    </ul>
  </div>
</nav>

<main>
  <div class="container">

    <div class="pg-head" id="form-section">
      <h1>Input Data Produk</h1>
      <p>Tambah produk ke tabel <code>products</code> — database Sesi 6.</p>
    </div>

    <?php if ($success): ?>
      <div class="flash flash-success"><?= h($success) ?></div>
    <?php endif; ?>

    <?php if ($dbError || isset($errors['db'])): ?>
      <div class="flash flash-error"><?= h($dbError ?? $errors['db']) ?></div>
    <?php endif; ?>

    <div class="main-grid">

      <!-- Form -->
      <form action="store.php" method="POST" enctype="multipart/form-data">

        <div class="field">
          <label for="productName" class="lbl lbl-req">Nama Produk</label>
          <input
            type="text"
            class="ctrl <?= isset($errors['name']) ? 'has-error' : '' ?>"
            id="productName"
            name="name"
            value="<?= oldVal($old, 'name') ?>"
            maxlength="150"
            required
          />
          <?php if (isset($errors['name'])): ?>
            <p class="err"><?= h($errors['name']) ?></p>
          <?php endif; ?>
        </div>

        <div class="field">
          <label for="productDesc" class="lbl">Deskripsi</label>
          <textarea
            class="ctrl"
            id="productDesc"
            name="description"
            rows="3"
            placeholder="Deskripsi singkat produk (opsional)"
          ><?= oldVal($old, 'description') ?></textarea>
        </div>

        <div class="field">
          <label for="productImage" class="lbl">Gambar Produk</label>
          <input
            type="file"
            class="ctrl <?= isset($errors['image']) ? 'has-error' : '' ?>"
            id="productImage"
            name="image"
            accept="image/jpeg,image/png,image/gif,image/webp"
          />
          <?php if (isset($errors['image'])): ?>
            <p class="err"><?= h($errors['image']) ?></p>
          <?php else: ?>
            <p class="hint">JPG, PNG, GIF, WebP — maks. 2 MB</p>
          <?php endif; ?>
          <div id="imagePreviewWrap" class="img-preview-box">
            <img id="imagePreview" src="" alt="Preview" />
          </div>
        </div>

        <div class="field-row">
          <div class="field">
            <label for="productPrice" class="lbl lbl-req">Harga</label>
            <div class="ctrl-group <?= isset($errors['price']) ? 'has-error' : '' ?>">
              <span class="ctrl-addon">Rp</span>
              <input
                type="number"
                id="productPrice"
                name="price"
                value="<?= oldVal($old, 'price') ?>"
                min="0"
                step="0.01"
                placeholder="0"
                required
              />
            </div>
            <?php if (isset($errors['price'])): ?>
              <p class="err"><?= h($errors['price']) ?></p>
            <?php endif; ?>
          </div>

          <div class="field">
            <label for="productStock" class="lbl">Stok</label>
            <input
              type="number"
              class="ctrl <?= isset($errors['stock']) ? 'has-error' : '' ?>"
              id="productStock"
              name="stock"
              value="<?= oldVal($old, 'stock', '0') ?>"
              min="0"
              placeholder="0"
            />
            <?php if (isset($errors['stock'])): ?>
              <p class="err"><?= h($errors['stock']) ?></p>
            <?php else: ?>
              <p class="hint">Default: 0</p>
            <?php endif; ?>
          </div>
        </div>

        <div class="field">
          <label for="productCategory" class="lbl">Kategori</label>
          <select
            class="ctrl <?= isset($errors['category']) ? 'has-error' : '' ?>"
            id="productCategory"
            name="category"
          >
            <option value="">Pilih kategori</option>
            <?php foreach (CATEGORIES as $cat): ?>
              <option value="<?= h($cat) ?>"<?= selected($cat, $old['category'] ?? '') ?>>
                <?= h($cat) ?>
              </option>
            <?php endforeach; ?>
          </select>
          <?php if (isset($errors['category'])): ?>
            <p class="err"><?= h($errors['category']) ?></p>
          <?php endif; ?>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-primary">Simpan Produk</button>
          <a href="index.php" class="btn-ghost">Reset</a>
        </div>

      </form>

      <!-- Schema reference -->
      <aside class="schema">
        <p class="schema-heading">Skema tabel <code>products</code></p>
        <table class="schema-table">
          <thead>
            <tr>
              <th>Kolom</th>
              <th>Tipe</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <tr><td><code>id</code></td><td>INT</td><td class="note">auto</td></tr>
            <tr><td><code>name</code></td><td>VARCHAR(150)</td><td>NOT NULL</td></tr>
            <tr><td><code>description</code></td><td>TEXT</td><td class="note">nullable</td></tr>
            <tr><td><code>image</code></td><td>VARCHAR(255)</td><td class="note">nullable</td></tr>
            <tr><td><code>price</code></td><td>DECIMAL(10,2)</td><td>NOT NULL</td></tr>
            <tr><td><code>stock</code></td><td>INT</td><td class="note">DEFAULT 0</td></tr>
            <tr><td><code>category</code></td><td>VARCHAR(100)</td><td class="note">nullable</td></tr>
          </tbody>
        </table>
      </aside>

    </div>

    <!-- Products table -->
    <section class="tbl-section" id="table-section">
      <div class="tbl-toolbar">
        <h2 class="tbl-title">
          Data Produk
          <span class="tbl-count" id="productCount"><?= count($products) ?> produk</span>
        </h2>
        <input
          type="text"
          class="search-box"
          id="searchInput"
          placeholder="Cari..."
        />
      </div>

      <?php if (empty($products) && !$dbError): ?>
        <div class="empty-state">Belum ada produk. Tambahkan menggunakan form di atas.</div>
      <?php else: ?>
        <div style="overflow-x:auto">
          <table class="data-table" id="productTable">
            <thead>
              <tr>
                <th style="width:40px">#</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th style="width:60px">Stok</th>
                <th style="width:60px"></th>
              </tr>
            </thead>
            <tbody id="productTableBody">
              <?php foreach ($products as $i => $p): ?>
                <?php
                  $initials   = mb_strtoupper(mb_substr($p['name'], 0, 2));
                  $stock      = (int) $p['stock'];
                  $stockClass = $stock === 0 ? 'stock-out' : ($stock <= 30 ? 'stock-low' : '');
                ?>
                <tr
                  data-name="<?= h(strtolower($p['name'])) ?>"
                  data-category="<?= h(strtolower($p['category'] ?? '')) ?>"
                >
                  <td><?= $i + 1 ?></td>
                  <td>
                    <div class="prod-cell">
                      <?php if (!empty($p['image'])): ?>
                        <img
                          src="uploads/<?= h($p['image']) ?>"
                          alt=""
                          class="prod-thumb"
                          onerror="this.outerHTML='<div class=\'prod-init\'><?= h($initials) ?></div>'"
                        />
                      <?php else: ?>
                        <div class="prod-init"><?= h($initials) ?></div>
                      <?php endif; ?>
                      <div>
                        <div class="prod-name"><?= h($p['name']) ?></div>
                        <?php if (!empty($p['description'])): ?>
                          <div class="prod-desc"><?= h(mb_strimwidth($p['description'], 0, 55, '…')) ?></div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </td>
                  <td><?= $p['category'] ? h($p['category']) : '—' ?></td>
                  <td><?= formatRupiah((float) $p['price']) ?></td>
                  <td class="<?= $stockClass ?>"><?= $stock ?></td>
                  <td>
                    <form
                      action="delete.php"
                      method="POST"
                      onsubmit="return confirm('Hapus \'<?= h(addslashes($p['name'])) ?>\'?')"
                    >
                      <input type="hidden" name="id" value="<?= (int) $p['id'] ?>" />
                      <button type="submit" class="btn-del">Hapus</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div id="emptySearch" class="empty-state" style="display:none">
          Produk tidak ditemukan.
        </div>
      <?php endif; ?>
    </section>

  </div>
</main>

<footer class="site-footer">
  <div class="container">Sesi 7 — Bootcamp Eduwork</div>
</footer>

<script src="script.js"></script>

</body>
</html>
