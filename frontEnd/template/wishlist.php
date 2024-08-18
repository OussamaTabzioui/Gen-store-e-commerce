<?php
// Include database connection
include 'php/user.php';

// Fetch user ID from session or other means
$user_id = $_SESSION['user_id']; // Ensure user_id is set in the session

// Function to get wishlist items

// include 'php/functions.php';

// Fetch wishlist items
$wishlistItems = getWishlistItems($user_id);
?>
<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>gen market</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- CSS here -->
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

    <!-- offcanvas area start -->
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
                        <img src="assets/img/logo/logo-white.png" alt="logo">
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

                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas area end -->
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->
    <?php include 'php/header.php' ?>
    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Wishlist</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="index.php"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Wishlist</span>
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
        <!-- page-banner-area-end -->

        <!-- cart-area-start -->
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
                                    <tbody>
                                        <?php foreach ($wishlistItems as $item): ?>
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="product-details.php?id=<?php echo $item['id_p']; ?>">
                                                        <img src="<?php echo $item['image_url1']; ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="product-details.php?id=<?php echo $item['id_p']; ?>"><?php echo htmlspecialchars($item['name']); ?></a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">$<?php echo number_format($item['price'], 2); ?></span>
                                                </td>
                                                <td class="product-quantity d-flex justify-content-center align-items-center flex-column">
                                                    <form action="php/add_to_cart.php" method="POST">
                                                        <input type="hidden" name="id_p" value="<?php echo $item['id_p']; ?>">
                                                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['user_id']; ?>"> <!-- Assuming user ID is stored in session -->
                                                        <!-- <input type="number" name="quantity" value="1" min="1" class="quantity-input"> -->
                                                        <div class="cart-plus-minus " style="padding: 10px 0 10px 0px;">
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
                                                    <a href="php/remove_item_wishlist.php?id=<?php echo $item['id_p']; ?>&user_id=<?php echo $_SESSION['user_id']; ?>" class="remove-button">
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
        <!-- cart-area-end -->

        <!-- cta-area-start -->

        <!-- cta-area-end -->

    </main>

    <!-- footer-start -->
    <?php include 'php/footer.php'?>
    <!-- footer-end -->

    <!-- JS here -->

</body>

<!-- Mirrored from wphix.com/template/Gen-store/Gen-store/wishlist.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 10:39:44 GMT -->

</html>
