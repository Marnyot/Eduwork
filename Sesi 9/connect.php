<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ── Konfigurasi Database ────────────────────────────────────────────────────
$host = getenv('DB_HOST') ?: 'localhost';
$db = 'Sesi 9';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// ── Helper Keranjang (session-based) ────────────────────────────────────────
function cart_get(): array
{
    return $_SESSION['cart'] ?? [];
}

function cart_count(): int
{
    return array_sum(cart_get());
}

function cart_total(PDO $pdo): float
{
    $total = 0.0;
    $cart = cart_get();
    if (!$cart) {
        return $total;
    }

    $ids = array_keys($cart);
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $pdo->prepare("SELECT id, price FROM products WHERE id IN ($placeholders)");
    $stmt->execute($ids);

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $total += (float) $row['price'] * (int) $cart[$row['id']];
    }
    return $total;
}

// ── Helper Gambar (konversi ke AVIF via Imagick + heif-enc) ─────────────────
function convert_to_avif(string $srcPath)
{
    try {
        $img = new Imagick($srcPath);
        $img->setImageType(Imagick::IMGTYPE_TRUECOLOR);
        $img->setOption('png:color-type', '2');
        $tmpPng = tempnam(sys_get_temp_dir(), 'avif_') . '.png';
        $img->writeImage($tmpPng);
        $img->clear();

        $outName = time() . '_' . bin2hex(random_bytes(6)) . '.avif';
        $outPath = dirname($srcPath) . '/' . $outName;

        $cmd = 'LD_LIBRARY_PATH=/usr/lib/x86_64-linux-gnu /usr/bin/heif-enc -A -q 60 ' . escapeshellarg($tmpPng) . ' -o ' . escapeshellarg($outPath) . ' 2>&1';
        exec($cmd, $output, $code);

        @unlink($tmpPng);
        if ($code !== 0 || !file_exists($outPath)) {
            return false;
        }
        return $outName;
    } catch (Exception $e) {
        return false;
    }
}
?>
