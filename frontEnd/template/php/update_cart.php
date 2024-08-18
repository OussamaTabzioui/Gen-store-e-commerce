<?php
// Include database connection
include 'db.php';
include 'user.php';

// Check if the update request is made
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle quantity updates
    if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $product_id => $quantity) {
            $quantity = (int)$quantity;

            // Ensure quantity is valid
            if ($quantity > 0) {
                // Update the quantity if item exists
                $stmt = $pdo->prepare("UPDATE basket SET Quantity = ? WHERE id_p = ? AND id_user = ?");
                $stmt->execute([$quantity, $product_id, $user_id]);
            } else {
                // If quantity is zero or less, remove the item
                $stmt = $pdo->prepare("DELETE FROM basket WHERE id_p = ? AND id_user = ?");
                $stmt->execute([$product_id, $user_id]);
            }
        }
    }

    // Handle coupon code application
    if (isset($_POST['apply_coupon'])) {
        $coupon_code = $_POST['coupon_code'];

        // Logic to apply coupon code can be added here
        // For example, validate coupon code and apply discount
    }

    // Redirect back to the cart page
    header("Location: ../cart.php");
    exit();
} else {
    // If not a POST request, redirect to the cart page
    header("Location: ../cart.php");
    exit();
}
?>
