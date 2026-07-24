<?php

// ── Konfigurasi Database ────────────────────────────────────────────────────
define('DB_HOST',    getenv('DB_HOST') ?: 'localhost');
define('DB_NAME',    'Sesi 6');
define('DB_USER',    'root');
define('DB_PASS',    '');
define('DB_CHARSET', 'utf8mb4');

// ── Direktori upload ────────────────────────────────────────────────────────
define('UPLOAD_DIR', __DIR__ . '/uploads/');
define('UPLOAD_MAX_SIZE', 2 * 1024 * 1024); // 2 MB
define('UPLOAD_ALLOWED_MIME', ['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
define('UPLOAD_ALLOWED_EXT',  ['jpg', 'jpeg', 'png', 'gif', 'webp']);

// ── Daftar kategori yang diizinkan ──────────────────────────────────────────
const CATEGORIES = [
    'Category A',
    'Category B',
    'Category C',
    'Electronics',
    'Fashion',
    'Home & Living',
    'Sports & Fitness',
    'Shoes',
    'Books & Stationery',
];

// ── Koneksi database (PDO singleton) ────────────────────────────────────────
function db(): PDO
{
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    $dsn = sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        DB_HOST, DB_NAME, DB_CHARSET
    );

    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);

    return $pdo;
}

// ── Helper: escape output HTML (cegah XSS) ──────────────────────────────────
function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// ── Helper: tandai <option> terpilih ────────────────────────────────────────
function selected(string $value, string $current): string
{
    return $value === $current ? ' selected' : '';
}

// ── Helper: format harga ke Rupiah ──────────────────────────────────────────
function formatRupiah(float $amount): string
{
    return 'Rp ' . number_format($amount, 2, ',', '.');
}
