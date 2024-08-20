<?php
    session_start();
    include 'php/db.php';
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
                    <button type="submit" ><i class="far fa-search"></i></button>
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

        <!-- page-banner-area-end -->

        <!-- account-area-start -->
        <div class="account-area mt-70 mb-70">
            <<div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="basic-login mb-50">
                            <h5>Login</h5>

                            <form action="php/login.php" method="POST">
                                <label for="login-email">Email address<span>*</span></label>
                                <input id="login-email" name="email" type="email" placeholder="Enter Email" required>
                                <label for="login-pass">Password <span>*</span></label>
                                <input id="login-pass" name="password" type="password" placeholder="Enter password..." required>
                                <div class="login-action mb-10 fix">
                                    <span class="log-rem f-left">
                                        <input id="remember" type="checkbox">
                                        <label for="remember">Remember me</label>
                                    </span>
                                    <span class="forgot-login f-right">
                                        <a href="#">Lost your password?</a>
                                    </span>
                                </div>
                                <button type="submit" class="tp-in-btn w-100">Log in</button>
                            </form>
                            <?php
                            if (isset($_SESSION['error_message'])) {
                                echo "<p style='color:red;'>" . $_SESSION['error_message'] . "</p>";
                                unset($_SESSION['error_message']);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="basic-login">
                            <h5>Register</h5>
                            <form action="php/register.php" method="POST">
                                <label for="reg-username">Username<span>*</span></label>
                                <input id="reg-username" name="username" type="text" placeholder="Enter Username" required>
                                <label for="reg-email">Email Address <span>*</span></label>
                                <input id="reg-email" name="email" type="email" placeholder="Email address..." required>
                                <label for="reg-pass">Password <span>*</span></label>
                                <input id="reg-pass" name="password" type="password" placeholder="Enter password..." required>
                                <div class="login-action mb-10 fix">
                                    <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#">privacy policy</a>.</p>
                                </div>
                                <button type="submit" class="tp-in-btn w-100">Register</button>
                            </form>
                            <?php
                            if (isset($_SESSION['error_message_r'])) {
                                echo "<p style='color:red;'>" . $_SESSION['error_message_r'] . "</p>";
                                unset($_SESSION['error_message_r']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- account-area-end -->

        <!-- cta-area-start -->
        <section class="cta-area d-ldark-bg pt-55 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item cta-item-d mb-30">
                            <h5 class="cta-title">Follow Us</h5>
                            <p>We make consolidating, marketing and tracking your social media website easy.</p>
                            <div class="cta-social">
                                <div class="social-icon">
                                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="rss"><i class="fas fa-rss"></i></a>
                                    <a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item mb-30">
                            <h5 class="cta-title">Sign Up To Newsletter</h5>
                            <p>Join 60.000+ subscribers and get a new discount coupon  on every Saturday.</p>
                            <div class="subscribe__form">
                                <form action="#">
                                    <input type="email" placeholder="Enter your email here...">
                                    <button>subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item mb-30">
                            <h5 class="cta-title">Download App</h5>
                            <p>Gen-store App is now available on App Store & Google Play. Get it now.</p>
                            <div class="cta-apps">
                                <div class="apps-store">
                                    <a href="#"><img src="assets/img/brand/app_ios.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/app_android.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- cta-area-end -->

    </main>

    <!-- footer-start -->






   </body>

</html>
