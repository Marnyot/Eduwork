<?php
    require_once '../../connect.php';

    $id = $_GET['id'] ?? null;

    if ($id !== null && is_numeric($id)) {
        $stmt = $pdo->prepare("SELECT image FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            $pdo->prepare("DELETE FROM products WHERE id = :id")->execute([':id' => $id]);
            if (!empty($product['image'])) {
                @unlink('../../uploads/' . $product['image']);
            }
        }
    }

    header('Location: ../index.php');
    exit();
?>
