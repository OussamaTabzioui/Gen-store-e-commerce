<?php
include 'php/user.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenStore</title>
</head>


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
    <style>
        /* Animation for the button */
        * {
            transform: all 1s ease-in-out;
        }

        /* Hide the video container by default */
        /* Hide the video container by default */
        .video-container {
            text-align: center;
            display: none;
            width: 100%;
            /* height: 80px; */
            background-color: #fcbe00;

        }

        /* Style the video element */
        video {
            width: 100px;
            /* Adjust width as needed */
            height: 80px;
            /* Adjust height as needed */
            object-fit: cover;
            /* Ensures the video covers the container without stretching */
            /* filter: brightness(0) invert(1); */
            /* Adjusts color to white */
            mix-blend-mode: screen;
            /* Ensure the video appears on a transparent background */
            background: transparent;
            /* Ensure video background is transparent */
        }

        .video-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.5);
            /* White overlay with some transparency */
            pointer-events: none;
            /* Allow clicks to pass through */
            mix-blend-mode: overlay;
            /* Overlay blend mode for the highlight effect */
        }

        /* Ensure no interaction with the video */
        video::-webkit-media-controls {
            display: none !important;
        }
    </style>
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
                            <h4 class="breadcrumb-title">Checkout</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="cart.php"><span>Cart</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Checkout</span>
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

        <!-- coupon-area-start -->
        <section class="coupon-area pt-120 pb-30">
            <div class="container">
                <div class="row d-flex justify-content-center">

                    <div class="col-md-6">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input type="text" placeholder="Coupon Code">
                                            <button class="tp-btn-h1" type="submit">Apply Coupon</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- coupon-area-end -->

        <!-- checkout-area-start -->
        <section class="checkout-area pb-85">
            <div class="container">
                <form action="php/process_order.php" method="post">
                    <div class="d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="your-order mb-30">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cartItems as $item): ?>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        <?php echo htmlspecialchars($item['name']); ?>
                                                        <strong class="product-quantity"> × <?php echo htmlspecialchars($item['Quantity']); ?></strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount"><?php echo htmlspecialchars('$' . number_format($item['price'] * $item['Quantity'], 2)); ?></span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount"><?php echo htmlspecialchars('$' . number_format($totalPrice, 2)); ?></span></td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Shipping</th>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <input type="radio" name="shipping" value="flat_rate">
                                                            <label>Flat Rate: <span class="amount">$7.00</span></label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" name="shipping" value="free_shipping">
                                                            <label>Free Shipping:</label>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount"><?php echo htmlspecialchars('$' . number_format($totalPrice + 7.00, 2)); ?></span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="payment-method">
                                    <div class="accordion" id="checkoutAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="paypalThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                                                    PayPal
                                                </button>
                                            </h2>
                                            <div class="accordion-body">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                <input type="text" name="paypalEmail" placeholder="Enter your PayPal Email">
                                                <input type="text" name="paypalAmount" placeholder="Enter Amount">
                                                <div class="order-button-payment mt-20">
                                                    <button type="button" class="tp-btn-h1" onclick="validateAndShowVideo()">Check The Methode</button>
                                                </div>
                                                <div id="video-container" class="video-container" style="display:none;">
                                                    <video id="successVideo" width="80" height="80" controls>
                                                        <source src="assets/audio/vidS.mp4" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="order-button-payment mt-20">
                                        <button type="submit" class="tp-btn-h1">Place order</button>
                                    </div>
                                </div>
                                <audio id="successSound" src="/assets/audio/success-sound.mp3" preload="auto"></audio>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>




        <!-- checkout-area-end -->

        <!-- cta-area-start -->

        <!-- cta-area-end -->

    </main>

    <!-- footer-start -->
    <?php include 'php/footer.php' ?>
    <!-- footer-end -->

    <!-- JS here -->
    <script>
        function validateAndShowVideo() {
            // Get form and video elements
            const paypalForm = document.querySelector('.accordion-body');
            const videoContainer = document.getElementById('video-container');
            const successVideo = document.getElementById('successVideo');
            const validateButton = document.querySelector('button[onclick="validateAndShowVideo()"]');

            // Get form values
            const paypalEmail = paypalForm.querySelector('input[name="paypalEmail"]').value;
            const paypalAmount = paypalForm.querySelector('input[name="paypalAmount"]').value;

            // Check if any value is entered
            if (paypalEmail || paypalAmount) {
                // Hide the button
                validateButton.style.display = 'none';

                // Show the video
                videoContainer.style.display = 'block';

                // Play the video and ensure it doesn't repeat and freezes on the last frame
                successVideo.play();
                successVideo.loop = false;
                successVideo.addEventListener('ended', function() {
                    successVideo.pause();
                    successVideo.currentTime = successVideo.duration; // Move to the last frame
                });
            } else {
                alert('Please enter values in the PayPal form.');
            }
        }
    </script>
</body>

</html>
