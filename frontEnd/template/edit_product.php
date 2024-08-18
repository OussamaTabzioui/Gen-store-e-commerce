<?php
require 'php/user.php'; // Include your database connection
 // Include the functions file with get_categories()

// Ensure the product ID is provided in the URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Fetch the product details to display in the form
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id_p = ?');
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    if (!$product) {
        die('Product not found.');
    }
} else {
    die('No product ID provided.');
}

// Handle form submission for updating the product
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $stock = $_POST['stock'];

    // Handle file uploads (only update if a new file is uploaded)
    $image1 = $product['image_url1'];
    if (!empty($_FILES['image1']['name'])) {
        $image1 = 'uploads/' . basename($_FILES['image1']['name']);
        move_uploaded_file($_FILES['image1']['tmp_name'], $image1);
    }

    $image2 = $product['image_url2'];
    if (!empty($_FILES['image2']['name'])) {
        $image2 = 'uploads/' . basename($_FILES['image2']['name']);
        move_uploaded_file($_FILES['image2']['tmp_name'], $image2);
    }

    $image3 = $product['image_url3'];
    if (!empty($_FILES['image3']['name'])) {
        $image3 = 'uploads/' . basename($_FILES['image3']['name']);
        move_uploaded_file($_FILES['image3']['tmp_name'], $image3);
    }

    // Update the product in the database
    $sql = 'UPDATE products SET name = ?, description = ?, id_c = ?, price = ?, discount = ?, stock = ?, image_url1 = ?, image_url2 = ?, image_url3 = ? WHERE id_p = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $description, $category, $price, $discount, $stock, $image1, $image2, $image3, $product_id]);

    // Redirect to the product details page after updating
    header('Location: product-details.php?id=' . $product_id);
    exit();
}

?>

<!-- Your HTML form should be here (as provided in your previous message) -->
