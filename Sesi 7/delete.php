<?php
/**
 * Backend: Hapus Produk
 * Menghapus produk dari database dan file gambarnya dari folder uploads/.
 */

session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id < 1) {
    $_SESSION['errors'] = ['db' => 'ID produk tidak valid.'];
    header('Location: index.php#table-section');
    exit;
}

try {
    $pdo = db();

    // Ambil nama file gambar sebelum dihapus
    $stmt = $pdo->prepare('SELECT image FROM products WHERE id = ?');
    $stmt->execute([$id]);
    $product = $stmt->fetch();

    if (!$product) {
        $_SESSION['errors'] = ['db' => 'Produk tidak ditemukan.'];
        header('Location: index.php#table-section');
        exit;
    }

    // Hapus record dari database
    $pdo->prepare('DELETE FROM products WHERE id = ?')->execute([$id]);

    // Hapus file gambar dari folder uploads/ jika ada
    if (!empty($product['image'])) {
        $filepath = UPLOAD_DIR . $product['image'];
        if (file_exists($filepath)) {
            unlink($filepath);
        }
    }

    $_SESSION['success'] = 'Produk berhasil dihapus.';

} catch (PDOException $e) {
    $_SESSION['errors'] = ['db' => 'Gagal menghapus produk. Silakan coba lagi.'];
}

header('Location: index.php#table-section');
exit;
