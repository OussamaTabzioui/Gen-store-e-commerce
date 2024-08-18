<?php
// Include database connection file
include 'php/user.php'; // Ensure this file initializes $pdo and sets up the connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $stock = $_POST['stock'];
    $id_c = $_POST['category']; // Assuming you use the category ID as the input

    // Prepare and execute query to fetch seller's ID
    $stmt = $pdo->prepare("SELECT id_s FROM seller WHERE username = :username");
    $stmt->bindParam(':username', $username); // Ensure $username is defined or passed to this script
    $stmt->execute();
    $result = $stmt->fetch();
    $id_s = $result['id_s'];

    // Check if product name already exists
    $stmt = $pdo->prepare("SELECT 1 FROM products WHERE name = :name");
    $stmt->bindParam(':name', $name);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Product name already exists, redirect back to insert page with error message
        header('Location: insert_product-page.php?error=product_name_exists');
        exit;
    }

    try {
        // Insert product data into the database
        $stmt = $pdo->prepare("INSERT INTO products (name, description, price, image_url1, image_url2, image_url3, stock, id_c, id_s, discount) VALUES (:name, :description, :price, :image_url1, :image_url2, :image_url3, :stock, :id_c, :id_s, :discount)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image_url1', $image_url1);
        $stmt->bindParam(':image_url2', $image_url2);
        $stmt->bindParam(':image_url3', $image_url3);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':id_c', $id_c, PDO::PARAM_INT);
        $stmt->bindParam(':id_s', $id_s, PDO::PARAM_INT);
        $stmt->bindParam(':discount', $discount, PDO::PARAM_INT);

        // Execute the insert statement
        $stmt->execute();
        $product_id = $pdo->lastInsertId(); // Get the last inserted product ID

        // Handle file uploads
        $uploadDir = 'assets/img/product/' . $id_c . '/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadStatus = true;

        // Rename and move files
        $file_name1 = $product_id . '_' . strtolower(str_replace(' ', '_', $name)) . '_img1.' . pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION);
        $file_name2 = $product_id . '_' . strtolower(str_replace(' ', '_', $name)) . '_img2.' . pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION);
        $file_name3 = $product_id . '_' . strtolower(str_replace(' ', '_', $name)) . '_img3.' . pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION);

        $image_url1 = $uploadDir . $file_name1;
        $image_url2 = $uploadDir . $file_name2;
        $image_url3 = $uploadDir . $file_name3;

        if (move_uploaded_file($_FILES['image1']['tmp_name'], $image_url1) &&
            move_uploaded_file($_FILES['image2']['tmp_name'], $image_url2) &&
            move_uploaded_file($_FILES['image3']['tmp_name'], $image_url3)) {

            // Update the database with file paths
            $stmt = $pdo->prepare("UPDATE products SET image_url1 = :image_url1, image_url2 = :image_url2, image_url3 = :image_url3 WHERE id_p = :id_p");
            $stmt->bindParam(':image_url1', $image_url1);
            $stmt->bindParam(':image_url2', $image_url2);
            $stmt->bindParam(':image_url3', $image_url3);
            $stmt->bindParam(':id_p', $product_id, PDO::PARAM_INT);
            $stmt->execute();

            echo "New product added successfully.";
        } else {
            echo "Error uploading images.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Redirect or show success message
    header('Location: seller.php');
    exit;
}
?>
