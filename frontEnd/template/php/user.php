<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'check_login_status.php';
// Check if the user is logged in

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

// Database connection details
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "Genstore";

include_once 'functions.php';
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if there is an error message in the query parameters

// Fetch total price data for the user to do an if condition
$totalPrice = isset($totalPrice) ? $totalPrice : 0;
try {
    // Fetch user profile picture
    $stmt = $pdo->prepare("SELECT profile_pic, username FROM users WHERE id_user = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $profile_pic = $user['profile_pic'] ?? 'assets/img/author/default.png';
        $username = $user['username']; // Fetch the user ID
    } else {
        header('location: php/logout.php');
        exit();
    }

    // Handle Add to Wishlist
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_wishlist'])) {
        $product_id = $_POST['product_id'];

        // Check if item already in wishlist
        $stmt = $pdo->prepare("SELECT * FROM wishlist WHERE id_p = ? AND id_user = ?");
        $stmt->execute([$product_id, $user_id]);
        $existingItem = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$existingItem) {
            // Insert new item if it doesn't exist
            $stmt = $pdo->prepare("INSERT INTO wishlist (id_p, id_user) VALUES (?, ?)");
            $stmt->execute([$product_id, $user_id]);
        }

        // Redirect to avoid resubmission on refresh
        $redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../wishlist.php';
        header("Location: $redirect_url");
        exit();
    }

    // assuming you have a function to get the current user's username


    // query to find the seller's ID based on their username
    if(isUserSeller($username)){
        $stmt = $pdo->prepare("SELECT id_s FROM seller WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // fetch the seller's ID
    $result = $stmt->fetch();
    $id_s = $result['id_s'];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id_s = :id_s");
    $stmt->bindParam(':id_s', $id_s); // assuming $id_s is the variable holding the value
    $stmt->execute();
}
    // Fetch products of seller
    $products_seller = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Fetch products
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $trendingProducts = getTrendingProducts();

    // Fetch cart items for display
    $stmt = $pdo->prepare("
        SELECT b.*, p.name, p.price, p.image_url1
        FROM basket b
        JOIN products p ON b.id_p = p.id_p
        WHERE b.id_user = ?");
    $stmt->execute([$user_id]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $wishlistData = getWishlistData($user_id);
    $wishlistItems = $wishlistData['itemsW'];
    $totalItemsW = $wishlistData['totalItemsW'];

    // Handle Add to Cart
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $quantity = 1; // Default quantity, adjust as needed

        // Check if item already in basket
        $stmt = $pdo->prepare("SELECT * FROM basket WHERE id_p = ? AND id_user = ?");
        $stmt->execute([$product_id, $user_id]);
        $existingItem = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingItem) {
            // Update quantity if item exists
            $stmt = $pdo->prepare("UPDATE basket SET Quantity = Quantity + ? WHERE id_p = ? AND id_user = ?");
            $stmt->execute([$quantity, $product_id, $user_id]);
        } else {
            // Insert new item if it doesn't exist
            $stmt = $pdo->prepare("INSERT INTO basket (id_p, id_user, Quantity) VALUES (?, ?, ?)");
            $stmt->execute([$product_id, $user_id, $quantity]);
        }

        // Redirect to avoid resubmission on refresh
        $redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../wishlist.php';
        header("Location: $redirect_url");

        exit();
    }
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}

$cartData = getCartData($user_id);
$cartItems = $cartData['items'];
$totalItems = $cartData['totalItems'];
$totalPrice = $cartData['totalPrice'];




// Ensure this includes your database connection

try {
    $pdo = new PDO("mysql:host=localhost;dbname=Genstore", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch up to 6 categories
    $stmt = $pdo->query("SELECT * FROM category");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->query("
        SELECT c.*,COUNT(p.id_p) AS product_count
        FROM category c
        LEFT JOIN products p ON c.id_c = p.id_c
        GROUP BY c.id_c

    ");

    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
    exit();
}
// Ensure this includes your database connection




?>
