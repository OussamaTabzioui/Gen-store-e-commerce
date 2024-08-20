<?php
// Include necessary files
include 'php/user.php'; // Include user-related functions and session management

// Fetch user ID from session
$user_id = $_SESSION['user_id']; // Ensure user_id is set in the session

// Fetch wishlist items for the current user
$wishlistItems = getWishlistItems($user_id);
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gen Market - Wishlist</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/preloader.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="assets/css/backtotop.css">
    <link rel="stylesheet" href="assets/css/ui-range-slider.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Offcanvas Area Start -->
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
                <button class="offcanvas__close-btn" id="offcanvas__close-btn">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="offcanvas__content">
                <div class="offcanvas__logo mb-40">
                    <a href="index.php">
                        <img src="assets/img/logo/logo-white.png" alt="Gen Market Logo">
                    </a>
                </div>
                <div class="offcanvas__search mb-25">
                    <form action="#">
                        <input type="text" placeholder="What are you searching for?">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu fix"></div>
                <div class="offcanvas__action">
                    <!-- Additional actions can be added here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Offcanvas Area End -->

    <div class="body-overlay"></div>

    <!-- Header Include -->
    <?php include 'php/header.php'; ?>

    <main>
        <!-- Page Banner Area Start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Wishlist</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="index.php"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Wishlist</span>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Area End -->

        <!-- Wishlist Area Start -->
        <section class="cart-area pb-120 pt-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="php/add_to_cart.php" method="POST">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="product-price">Unit Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Loop through wishlist items and display each one -->
                                        <?php foreach ($wishlistItems as $item): ?>
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="product-details.php?id=<?php echo $item['id_p']; ?>">
                                                        <img src="<?php echo htmlspecialchars($item['image_url1']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="product-details.php?id=<?php echo $item['id_p']; ?>"><?php echo htmlspecialchars($item['name']); ?></a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">$<?php echo number_format($item['price'], 2); ?></span>
                                                </td>
                                                <td class="product-quantity d-flex justify-content-center align-items-center flex-column">
                                                    <!-- Form to update quantity and add item to cart -->
                                                    <form action="php/add_to_cart.php" method="POST">
                                                        <input type="hidden" name="id_p" value="<?php echo $item['id_p']; ?>">
                                                        <input type="hidden" name="id_user" value="<?php echo $user_id; ?>">
                                                        <div class="cart-plus-minus" style="padding: 10px 0;">
                                                            <input type="text" class="quantity-input" name="quantity" value="1" min="1">
                                                            <div class="dec qtybutton">-</div>
                                                            <div class="inc qtybutton">+</div>
                                                        </div>
                                                        <button type="submit" class="tp-btn-h1">Add To Cart</button>
                                                    </form>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">$<?php echo number_format($item['price'], 2); ?></span>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="php/remove_item_wishlist.php?id=<?php echo $item['id_p']; ?>&user_id=<?php echo $user_id; ?>" class="remove-button">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Wishlist Area End -->
    </main>

    <!-- Footer Include -->
    <?php include 'php/footer.php'; ?>

    <!-- JS Files -->
    <!-- Add JS files here if necessary -->

</body>
</html>
