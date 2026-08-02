<?php
    require_once __DIR__ . '/../connect.php';

    $id = $_GET['id'] ?? null;

    if ($id !== null && is_numeric($id)) {
        $stmt = $pdo->prepare("DELETE FROM orders WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    header('Location: index.php');
    exit();
?>
