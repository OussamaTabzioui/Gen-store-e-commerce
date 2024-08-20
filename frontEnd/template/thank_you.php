<?php
// Include database connection
include 'php/user.php'; // Ensure the correct path to the database connection file

// Fetch the order ID from query parameters
$order_id = $_GET['order_id'] ?? null; // Use null coalescing operator to handle undefined `order_id`

// Redirect to the homepage if no order ID is provided
if (!$order_id) {
    header("Location: index.php");
    exit();
}

// Fetch order details from the database
$stmt = $pdo->prepare("
    SELECT o.*, u.username
    FROM orders o
    JOIN users u ON o.id_user = u.id_user
    WHERE o.id_o = ?");
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch order details as an associative array

// Fetch order items related to the order
$stmt = $pdo->prepare("
    SELECT oi.*, p.name
    FROM order_items oi
    JOIN products p ON oi.id_p = p.id_p
    WHERE oi.id_o = ?");
$stmt->execute([$order_id]);
$orderItems = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all order items as an associative array
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Thank You</title>
    <link rel="stylesheet" href="assets/css/preloader.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="assets/css/backtotop.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .thank-you-area {
            background-color: #f7f7f7;
            /* light gray background */
            padding: 40px;
            /* add some padding to the section */
            border: 1px solid #ddd;
            /* add a border to the section */
            border-radius: 10px;
            /* add a rounded corner to the section */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* add a subtle shadow to the section */
        }

        .thank-you-area h2 {
            font-size: 24px;
            /* increase the font size of the h2 heading */
            font-weight: bold;
            /* make the h2 heading bold */
            margin-bottom: 10px;
            /* add some margin below the h2 heading */
        }

        .thank-you-area p {
            font-size: 16px;
            /* increase the font size of the paragraph text */
            margin-bottom: 20px;
            /* add some margin below the paragraph text */
        }

        .order-details {
            background-color: #fff;
            /* white background for the order details section */
            padding: 20px;
            /* add some padding to the order details section */
            border: 1px solid #ddd;
            /* add a border to the order details section */
            border-radius: 10px;
            /* add a rounded corner to the order details section */
            margin-bottom: 20px;
            /* add some margin below the order details section */
        }

        .order-details h3 {
            font-size: 18px;
            /* increase the font size of the h3 heading */
            font-weight: bold;
            /* make the h3 heading bold */
            margin-bottom: 10px;
            /* add some margin below the h3 heading */
        }

        .order-details p {
            font-size: 14px;
            /* increase the font size of the paragraph text */
            margin-bottom: 10px;
            /* add some margin below the paragraph text */
        }

        .order-items {
            list-style: none;
            /* remove the bullet points from the list */
            padding: 0;
            /* remove the padding from the list */
            margin: 0;
            /* remove the margin from the list */
        }

        .order-items li {
            font-size: 14px;
            /* increase the font size of the list item text */
            margin-bottom: 10px;
            /* add some margin below the list item */
            padding: 10px;
            /* add some padding to the list item */
            border-bottom: 1px solid #ddd;
            /* add a border to the bottom of the list item */
        }

        .order-items li:last-child {
            border-bottom: none;
            /* remove the border from the last list item */
        }
    </style>
</head>

<body>

    <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/banner-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">THANK YOU</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="index.php"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>THANK YOU</span>
                                        </li>
                                    </ul>
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="thank-you-area pb-85">
        <div class="container">
            <h2>Thank You for Your Order!</h2>
            <p>Your order has been placed successfully. Here are your order details:</p>
            <div class="order-details">
                <h3>Order ID: <?php echo htmlspecialchars($order['id_o']); ?></h3>
                <p>Order Date: <?php echo htmlspecialchars($order['order_date']); ?></p>
                <p>Subtotal: <?php echo htmlspecialchars('$' . number_format($order['subtotal'], 2)); ?></p>
                <p>Shipping Cost: <?php echo htmlspecialchars('$' . number_format($order['shipping_cost'], 2)); ?></p>
                <p>Total: <?php echo htmlspecialchars('$' . number_format($order['total'], 2)); ?></p>
            </div>
            <h3>Order Items:</h3>
            <ul class="order-items">
                <?php foreach ($orderItems as $item): ?>
                    <li>
                        <?php echo htmlspecialchars($item['name']); ?> × <?php echo htmlspecialchars($item['quantity']); ?> - <?php echo htmlspecialchars('$' . number_format($item['price'], 2)); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>



    <?php include 'php/footer.php' ?>


</body>

</html>
