<?php
function getWishlistItems($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT p.id_p, p.name, p.price, p.image_url1
        FROM wishlist w
        JOIN products p ON w.id_p = p.id_p
        WHERE w.id_user = ?");

    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
};

function getTrendingProducts($limit = 6) {
    global $pdo;

    $sql = "SELECT p.*, c.name AS category_name
        FROM products p
        JOIN category c ON p.id_c = c.id_c
        ORDER BY p.sells DESC,  p.rate DESC , discount DESC
        LIMIT :limit";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
};
function getCartData($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT b.*, p.name, p.price, p.image_url1
        FROM basket b
        JOIN products p ON b.id_p = p.id_p
        WHERE b.id_user = ?");
    $stmt->execute([$user_id]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $totalItems = 0;
    $totalPrice = 0;
    foreach ($cartItems as $item) {
        $totalItems += $item['Quantity'];
        $totalPrice += $item['price'] * $item['Quantity'];
    }

    return [
        'items' => $cartItems,
        'totalItems' => $totalItems,
        'totalPrice' => $totalPrice
    ];
}
function getWishlistData($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT w.*, p.name, p.price, p.image_url1
        FROM wishlist w
        JOIN products p ON w.id_p = p.id_p
        WHERE w.id_user = ?");
    $stmt->execute([$user_id]);
    $wishlistItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $totalItemsW = count($wishlistItems); // Count the number of items

    return [
        'itemsW' => $wishlistItems,
        'totalItemsW' => $totalItemsW
    ];
}

function isUserSeller($username) {
    // Prepare the SQL query to check if the user is a seller
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM seller WHERE username = ?");
    $stmt->execute([$username]);

    // Fetch the count of matching rows
    $count = $stmt->fetchColumn();

    // If the count is greater than 0, the user is a seller
    if($count > 0) {return true;}
    else{
        return false;
    }
}
function get_categories() {
    global $pdo; // Use the PDO connection defined elsewhere

    $stmt = $pdo->query('SELECT id_c, name FROM category');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function get_seller_products($seller_name) {
    global $pdo; // Use the PDO connection defined elsewhere

    $stmt = $pdo->prepare('SELECT p.* FROM products p JOIN seller s ON p.id_s = s.id_s WHERE s.username = :seller_name');
    $stmt->bindParam(':seller_name', $seller_name, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
