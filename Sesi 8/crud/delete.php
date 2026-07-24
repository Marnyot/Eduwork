<?php
    require_once '../connect.php';

    // Delete data from products table where id = 1
    $product_id = 1;
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $product_id]);
     echo "Data berhasil dihapus";
?>