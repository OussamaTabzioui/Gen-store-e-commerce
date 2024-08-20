<?php
// Include database connection
include 'php/db.php';
include 'php/user.php';

?>





<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>GenStore</title>
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
    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->


    <!-- preloader start -->

    <!-- preloader end -->

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->

    <!-- header-start -->
    <?php
    include 'php/header.php';
    ?>
    <!-- header-end -->

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

    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Your Cart</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="index.php"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Cart</span>
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
        <section class="cart-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="php/update_cart.php" method="post">
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
                                        <?php foreach ($cartItems as $item): ?>
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="product-details.php?id=<?php echo htmlspecialchars($item['id_p']); ?>">
                                                        <img src="<?php echo htmlspecialchars($item['image_url1']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="product-details.php?id=<?php echo htmlspecialchars($item['id_p']); ?>"><?php echo htmlspecialchars($item['name']); ?></a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount"><?php echo htmlspecialchars('$' . number_format($item['price'], 2)); ?></span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" name="quantity[<?php echo htmlspecialchars($item['id_p']); ?>]" value="<?php echo htmlspecialchars($item['Quantity']); ?>">
                                                        <div class="dec qtybutton">-</div>
                                                        <div class="inc qtybutton">+</div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount"><?php echo htmlspecialchars('$' . number_format($item['price'] * $item['Quantity'], 2)); ?></span>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="php/remove_item.php?id_p=<?php echo htmlspecialchars($item['id_p']); ?>">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <button class="tp-btn-h1" name="apply_coupon" type="submit">Apply coupon</button>
                                        </div>
                                        <div class="coupon2">
                                            <button class="tp-btn-h1" name="update_cart" type="submit">Update cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-5">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul class="mb-20">
                                            <li>Subtotal <span><?php echo htmlspecialchars('$' . number_format($totalPrice, 2)); ?></span></li>
                                            <li>Total <span><?php echo htmlspecialchars('$' . number_format($totalPrice, 2)); ?></span></li>
                                        </ul>
                                        <?php if ($totalPrice > 0): ?>
                                            <a class="tp-btn-h1" href="checkout.php">Proceed to Checkout</a>
                                        <?php else: ?>
                                            <p class="no-checkout">Proceed to checkout is not available</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
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
    <?php include 'php/footer.php' ?>





</body>

</html>
