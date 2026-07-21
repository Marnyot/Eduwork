<?php
/**
 * Backend: Tambah Produk
 * Menerima POST (multipart/form-data) dari form di index.php,
 * memvalidasi input + file upload, lalu menyimpan ke database.
 */

session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// ── Ambil & trim input teks ─────────────────────────────────────────────────
$name        = trim($_POST['name']        ?? '');
$description = trim($_POST['description'] ?? '');
$price       = trim($_POST['price']       ?? '');
$stock       = trim($_POST['stock']       ?? '');
$category    = trim($_POST['category']    ?? '');

// Simpan old input (tanpa image, tidak bisa di-repopulate di file input)
$_SESSION['old'] = compact('name', 'description', 'price', 'stock', 'category');

// ── Validasi input teks ─────────────────────────────────────────────────────
$errors = [];

// name: wajib, maks 150 karakter
if ($name === '') {
    $errors['name'] = 'Nama produk wajib diisi.';
} elseif (mb_strlen($name) > 150) {
    $errors['name'] = 'Nama produk maksimal 150 karakter.';
}

// price: wajib, harus numerik, tidak boleh negatif
if ($price === '') {
    $errors['price'] = 'Harga wajib diisi.';
} elseif (!is_numeric($price)) {
    $errors['price'] = 'Harga harus berupa angka.';
} elseif ((float) $price < 0) {
    $errors['price'] = 'Harga tidak boleh negatif.';
}

// stock: opsional, harus bilangan bulat non-negatif
if ($stock !== '' && $stock !== '0') {
    if (!ctype_digit($stock)) {
        $errors['stock'] = 'Stok harus berupa bilangan bulat.';
    } elseif ((int) $stock < 0) {
        $errors['stock'] = 'Stok tidak boleh negatif.';
    }
}

// category: opsional, harus dari whitelist
if ($category !== '' && !in_array($category, CATEGORIES, true)) {
    $errors['category'] = 'Kategori tidak valid.';
}

// ── Validasi & proses upload file gambar ────────────────────────────────────
$savedFilename = null;
$file = $_FILES['image'] ?? null;

if ($file && $file['error'] !== UPLOAD_ERR_NO_FILE) {
    // Cek error upload dari PHP
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors['image'] = match ($file['error']) {
            UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'Ukuran file terlalu besar.',
            UPLOAD_ERR_PARTIAL  => 'File hanya terupload sebagian. Coba lagi.',
            default             => 'Gagal mengupload file.',
        };
    } else {
        // Validasi ukuran file (maks 2 MB)
        if ($file['size'] > UPLOAD_MAX_SIZE) {
            $errors['image'] = 'Ukuran file maksimal 2 MB.';
        } else {
            // Validasi tipe MIME (baca langsung dari file, bukan dari header)
            $finfo    = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->file($file['tmp_name']);

            if (!in_array($mimeType, UPLOAD_ALLOWED_MIME, true)) {
                $errors['image'] = 'Format file tidak didukung. Gunakan JPG, PNG, GIF, atau WebP.';
            } else {
                // Validasi ekstensi
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                if (!in_array($ext, UPLOAD_ALLOWED_EXT, true)) {
                    $errors['image'] = 'Ekstensi file tidak valid.';
                } else {
                    // Generate nama file unik
                    $savedFilename = uniqid('img_', true) . '.' . $ext;

                    // Buat folder uploads jika belum ada
                    if (!is_dir(UPLOAD_DIR)) {
                        mkdir(UPLOAD_DIR, 0755, true);
                    }

                    // Pindahkan file dari temp ke uploads/
                    if (!move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $savedFilename)) {
                        $errors['image'] = 'Gagal menyimpan file. Periksa izin folder uploads/.';
                        $savedFilename = null;
                    }
                }
            }
        }
    }
}

// Jika ada error, kembalikan ke form
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: index.php#form-section');
    exit;
}

// ── Simpan ke database ──────────────────────────────────────────────────────
try {
    $stmt = db()->prepare(
        'INSERT INTO products (name, description, image, price, stock, category)
         VALUES (?, ?, ?, ?, ?, ?)'
    );

    $stmt->execute([
        $name,
        $description !== '' ? $description : null,
        $savedFilename,
        (float) $price,
        (int) ($stock !== '' ? $stock : 0),
        $category    !== '' ? $category    : null,
    ]);

    unset($_SESSION['old']);
    $_SESSION['success'] = "Produk \"$name\" berhasil ditambahkan.";

} catch (PDOException $e) {
    // Hapus file yang sudah diupload jika insert DB gagal
    if ($savedFilename && file_exists(UPLOAD_DIR . $savedFilename)) {
        unlink(UPLOAD_DIR . $savedFilename);
    }
    $_SESSION['errors'] = ['db' => 'Gagal menyimpan data ke database. Silakan coba lagi.'];
}

header('Location: index.php');
exit;
