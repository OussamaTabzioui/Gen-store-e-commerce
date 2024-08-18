<?php
session_start();
include 'db.php'; // Make sure this includes your database connection

// Ensure the user is logged in and user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php"); // Redirect to login if user is not authenticated
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_p = intval($_POST['id_p']);
    $id_user = intval($_SESSION['user_id']); // Use session variable for user ID
    $quantity = intval($_POST['quantity']);

    if(!$quantity){
        $quantity =1 ;
    }
    // Validate quantity
    if ($quantity <= 0 ) {
        echo "Invalid quantity.";
        exit();
    }

    // Check if the product is already in the basket
    $query = "SELECT * FROM basket WHERE id_p = ? AND id_user = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $id_p, $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update quantity if product is already in the basket
        $query = "UPDATE basket SET Quantity = Quantity + ? WHERE id_p = ? AND id_user = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iii", $quantity, $id_p, $id_user);
    } else {
        // Insert new record if product is not in the basket
        $query = "INSERT INTO basket (id_p, id_user, Quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iii", $id_p, $id_user, $quantity);
    }

    $stmt->execute();
    $stmt->close();

    // Redirect back to the referring page
    $redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../wishlist.php';
    header("Location: $redirect_url");
    exit();
}
?>
