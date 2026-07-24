<?php
    require_once '../../connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $category = $_POST['category'];
        $old_image = $_POST['old_image'];
        $image = $_FILES['image'];

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

        // validate new image only if one was uploaded (image is optional on edit)
        $image_name = $old_image;
        if ($image['error'] !== UPLOAD_ERR_NO_FILE) {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($image['type'], $allowed_types)) {
                $errors['image'] = 'Tipe file gambar tidak valid. Hanya JPG, PNG, dan GIF yang diperbolehkan.';
            } elseif ($image['size'] > 2 * 1024 * 1024) { // 2MB
                $errors['image'] = 'Ukuran file gambar terlalu besar. Maksimal 2MB.';
            } else {
                $image_name = basename($image['name']);
            }
        }

        if (empty($errors)) {
            if ($image_name !== $old_image) {
                move_uploaded_file($image['tmp_name'], '../../uploads/' . $image_name);
                if ($old_image !== '') {
                    @unlink('../../uploads/' . $old_image);
                }
            }

            $sql = "UPDATE products SET name = :name, price = :price, description = :description, stock = :stock, category = :category, image = :image WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':name' => $name,
                ':price' => $price,
                ':description' => $description,
                ':stock' => $stock,
                ':category' => $category,
                ':image' => $image_name,
            ]);

            header('Location: ../index.php');
            exit();
        }
    }
?>
