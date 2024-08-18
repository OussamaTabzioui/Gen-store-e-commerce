<?php
// Include database connection and functions
include 'user.php';
// include 'functions.php';


// Fetch user ID from session
$user_id = $_SESSION['user_id'] ?? null; // Handle missing user_id


// functions.php
function createOrder($user_id, $subtotal, $shipping_cost, $total) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("
            INSERT INTO orders (id_user, subtotal, shipping_cost, total, order_date)
            VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$user_id, $subtotal, $shipping_cost, $total]);

        // Get the last inserted order ID
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        // Handle the exception as needed
        throw new Exception("Failed to create order: " . $e->getMessage());
    }
}

function addOrderItem($order_id, $product_id, $quantity, $price) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("
        INSERT INTO order_items (id_o, id_p, quantity, price)
        VALUES (?, ?, ?, ?)");
        $stmt->execute([$order_id, $product_id, $quantity, $price]);
    } catch (PDOException $e) {
        // Handle the exception as needed
        throw new Exception("Failed to add order item: " . $e->getMessage());
    }
}

function updateStock($product_id, $quantity) {
    global $pdo;

    try {
        // Fetch the current stock for the product
        $stmt = $pdo->prepare("SELECT stock FROM products WHERE id_p = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            throw new Exception("Product not found.");
        }

        $current_stock = $product['stock'];

        // Check if there is enough stock
        if ($current_stock < $quantity) {
            return false; // Not enough stock
        }

        // Update the stock
        $stmt = $pdo->prepare("
            UPDATE products
            SET stock = stock - ?
            WHERE id_p = ?");
        $stmt->execute([$quantity, $product_id]);

        return true; // Success
    } catch (Exception $e) {
        // Handle the exception
        throw $e;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $user_id) {
    try {
        $shipping_method = $_POST['shipping'] ?? 'flat_rate';
        $cartData = getCartData($user_id);
        $cartItems = $cartData['items'];
        $totalPrice = $cartData['totalPrice'];

        // Calculate shipping cost
        $shipping_cost = ($shipping_method === 'free_shipping') ? 0.00 : 7.00;
        $order_total = $totalPrice + $shipping_cost;

        // Begin transaction
        $pdo->beginTransaction();

        // Insert order into the database
        $order_id = createOrder($user_id, $totalPrice, $shipping_cost, $order_total);

        // Insert order items into the database and update stock
        foreach ($cartItems as $item) {

            if (!updateStock($item['id_p'], $item['Quantity'])) {
                $error_message = urlencode("Failed to update stock for product name :" . $item['name']);
                // header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=' . $error_message);
                header('Location: ../cart.php'  . '?error=' . $error_message);
                exit();
            }
            addOrderItem($order_id, $item['id_p'], $item['Quantity'], $item['price']);
        }

        // Clear cart
        $stmt = $pdo->prepare("DELETE FROM basket WHERE id_user = ?");
        $stmt->execute([$user_id]);

        // Commit the transaction
        $pdo->commit();

        // Redirect to a thank you or confirmation page
        header("Location: ../thank_you.php?order_id=" . $order_id);
        exit();
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $pdo->rollBack();
        // Handle the exception (log it, show error message, etc.)
        echo 'Error processing order: ' . $e->getMessage();
    }
} else {
    // If not a POST request or user ID is missing, redirect to the checkout page
    header("Location: checkout.php");
    exit();
}
?>
