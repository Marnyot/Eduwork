<?php
    require_once __DIR__ . '/connect.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: cart.php');
        exit();
    }

    $cart = cart_get();
    if (empty($cart)) {
        header('Location: cart.php');
        exit();
    }

    $customer_name = trim($_POST['customer_name'] ?? '');
    $customer_email = trim($_POST['customer_email'] ?? '');
    $customer_phone = trim($_POST['customer_phone'] ?? '');
    $customer_address = trim($_POST['customer_address'] ?? '');
    $payment_method = $_POST['payment_method'] ?? '';
    $allowed_payments = ['qris', 'bank', 'cod'];

    $errors = [];
    if ($customer_name === '') {
        $errors[] = 'Nama lengkap harus diisi.';
    }
    if ($customer_email === '' || !filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email harus diisi dengan format yang benar.';
    }
    if ($customer_phone === '') {
        $errors[] = 'No. HP harus diisi.';
    }
    if ($customer_address === '') {
        $errors[] = 'Alamat pengiriman harus diisi.';
    }
    if (!in_array($payment_method, $allowed_payments, true)) {
        $errors[] = 'Metode pembayaran harus dipilih.';
    }

    if ($errors) {
        $_SESSION['checkout_errors'] = $errors;
        $_SESSION['checkout_old'] = $_POST;
        header('Location: checkout.php');
        exit();
    }

    // Ambil data produk di keranjang (harga & stok dari DB, bukan session)
    $ids = array_map('intval', array_keys($cart));
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute($ids);
    $products = [];
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $product) {
        $products[$product['id']] = $product;
    }

    $order_total = 0.0;
    $order_items = [];
    foreach ($cart as $id => $qty) {
        $product = $products[$id] ?? null;
        if (!$product) {
            continue;
        }
        $qty = min((int) $qty, (int) $product['stock']);
        if ($qty <= 0) {
            continue;
        }
        $order_items[] = [
            'product' => $product,
            'qty' => $qty,
        ];
        $order_total += (float) $product['price'] * $qty;
    }

    if (empty($order_items)) {
        $_SESSION['checkout_errors'] = ['Semua produk di keranjang sudah tidak tersedia. Silakan perbarui keranjang.'];
        header('Location: cart.php');
        exit();
    }

    $pdo->beginTransaction();
    try {
        $stmt = $pdo->prepare("INSERT INTO orders (customer_name, customer_email, customer_phone, customer_address, payment_method, total) VALUES (:name, :email, :phone, :address, :payment_method, :total)");
        $stmt->execute([
            ':name' => $customer_name,
            ':email' => $customer_email,
            ':phone' => $customer_phone,
            ':address' => $customer_address,
            ':payment_method' => $payment_method,
            ':total' => $order_total,
        ]);
        $order_id = (int) $pdo->lastInsertId();

        $stmtItem = $pdo->prepare("INSERT INTO order_items (order_id, product_id, product_name, price, quantity, subtotal) VALUES (:order_id, :product_id, :product_name, :price, :quantity, :subtotal)");
        $stmtStock = $pdo->prepare("UPDATE products SET stock = stock - :qty WHERE id = :id AND stock >= :qty");

        foreach ($order_items as $item) {
            $product = $item['product'];
            $qty = $item['qty'];
            $subtotal = (float) $product['price'] * $qty;

            $stmtItem->execute([
                ':order_id' => $order_id,
                ':product_id' => $product['id'],
                ':product_name' => $product['name'],
                ':price' => $product['price'],
                ':quantity' => $qty,
                ':subtotal' => $subtotal,
            ]);

            $stmtStock->execute([':qty' => $qty, ':id' => $product['id']]);
        }

        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }

    unset($_SESSION['cart']);
    unset($_SESSION['checkout_old']);

    header('Location: success.php?order_id=' . $order_id);
    exit();
?>
