<?php
    require_once '../connect.php';

    // Update data in products table (name, price, description, image, stock, category) where id = 1
    $id = 1;
    $name = "Laptop Updated";
    $price = 1500000;
    $description = "Laptop gaming updated";
    $image = "laptop_updated.jpg";
    $stock = 5;
    $category = "Elektronik";

    $sql = "UPDATE products SET name = :name, price = :price, description = :description, image = :image, stock = :stock, category = :category WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':name' => $name,
        ':price' => $price,
        ':description' => $description,
        ':image' => $image,
        ':stock' => $stock,
        ':category' => $category
    ]);
     echo "Data berhasil diupdate";
?>