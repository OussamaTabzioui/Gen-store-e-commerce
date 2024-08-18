<?php
session_start();
include 'db.php'; // Ensure this file includes your database connection setup

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_p = intval($_GET['id']);
    $id_user = intval($_GET['user_id']);

    if ($id_p <= 0 || $id_user <= 0) {
        echo "Invalid product or user ID.";
        exit();
    }

    // Prepare SQL query to delete the item from the basket
    $query = "DELETE FROM wishlist WHERE id_p = ? AND id_user = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $id_p, $id_user);
    $stmt->execute();
    $stmt->close();

    // Redirect to the wishlist or cart page
    header("Location: ../wishlist.php");
    exit();
} else {
    // If the request method is not GET, redirect to wishlist page
    header("Location: ../wishlist.php");
    exit();
}
?>
