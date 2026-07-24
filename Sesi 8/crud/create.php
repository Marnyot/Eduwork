<?php
    require_once '../connect.php';
    //Insert data into products table (name, price, desription, image, stock, category)

    $name = "Laptop";
    $price = 1000000;
    $description = "Laptop gaming";
    $image = "laptop.jpg";
    $stock = 10;
    $category = "Elektronik";

    $sql = "INSERT INTO products (name, price, description, image, stock, category) VALUES (:name, :price, :description, :image, :stock, :category)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':description' => $description,
        ':image' => $image,
        ':stock' => $stock,
        ':category' => $category
    ]);
     echo "Data berhasil ditambahkan";

?>