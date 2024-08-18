<?php
include 'db.php';
include 'user.php';


// Check if the item ID is provided
if (isset($_GET['id_p']) && !empty($_GET['id_p'])) {
    $product_id = $_GET['id_p'];

    // Remove the item from the basket
    $stmt = $pdo->prepare("DELETE FROM basket WHERE id_p = ? AND id_user = ?");
    $stmt->execute([$product_id, $user_id]);

    // Redirect back to the cart page
    header("Location: ../cart.php");
    exit();
} else {
    // If no item ID is provided, redirect to the cart page
    header("Location: ../cart.php");
    exit();
}
?>
