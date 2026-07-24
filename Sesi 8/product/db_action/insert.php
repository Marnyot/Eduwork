<?php
    require_once '../../connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $category = $_POST['category'];
        $image = $_FILES['image'];
        $image_tmp = $image['tmp_name'];

        // validate the form data
        $errors = [];
        if (empty($name)) {
            $errors['name'] = 'Nama produk harus diisi.';
        }
        if (empty($price) || !is_numeric($price) || $price < 0) {
            $errors['price'] = 'Harga produk harus diisi dan harus berupa angka positif.';
        }
        if (empty($description)) {
            $errors['description'] = 'Deskripsi produk harus diisi.';
        }
        if (empty($stock) || !is_numeric($stock) || $stock < 0) {
            $errors['stock'] = 'Stok produk harus diisi dan harus berupa angka positif.';
        }
        if (empty($category)) {
            $errors['category'] = 'Kategori produk harus diisi.';
        }

        // validate uploaded image
        if ($image['error'] === UPLOAD_ERR_NO_FILE || empty($image['name'])) {
            $errors['image'] = 'Gambar produk harus diunggah.';
        } else {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($image['type'], $allowed_types)) {
                $errors['image'] = 'Tipe file gambar tidak valid. Hanya JPG, PNG, dan GIF yang diperbolehkan.';
            } elseif ($image['size'] > 2 * 1024 * 1024) { // 2MB
                $errors['image'] = 'Ukuran file gambar terlalu besar. Maksimal 2MB.';
            }
        }

        if (empty($errors)) {
            $upload_dir = '../../uploads/';
            $image_path = $upload_dir . basename($image['name']);

            if (move_uploaded_file($image_tmp, $image_path)) {
                $sql = "INSERT INTO products (name, price, description, stock, category, image) VALUES (:name, :price, :description, :stock, :category, :image)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':name' => $name,
                    ':price' => $price,
                    ':description' => $description,
                    ':stock' => $stock,
                    ':category' => $category,
                    ':image' => basename($image['name']),
                ]);

                header('Location: ../index.php');
                exit();
            } else {
                $errors['image'] = 'Gagal mengunggah gambar.';
            }
        }
    }
?>
