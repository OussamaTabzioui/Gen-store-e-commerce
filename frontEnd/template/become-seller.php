<?php
include 'php/user.php';
$isSeller = isUserSeller($username);
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if (isUserSeller($username)) {
    header('location: seller_profile.php');
}
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bio = $_POST['bio'];
    $cni = $_POST['cni'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $profile_pic = $user['profile_pic']; // Use existing profile pic

    // Insert into seller table
    $stmt = $pdo->prepare("INSERT INTO seller (username, email, password, h_password, phone, address, bio, cni) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $user['username'],
        $user['email'],
        $user['password'],
        $user['h_password'],
        $phone,
        $address,
        $bio,
        $cni
    ]);

    // Optionally: Remove user from users table if needed
    // $stmt = $pdo->prepare("DELETE FROM users WHERE username = ?");
    // $stmt->execute([$username]);

    $_SESSION['success_message'] = "You are now a seller!";
    echo $_SESSION['success_message'];
    header('Location: seller.php'); // Redirect to success page
    exit();
}
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
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-3.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">My selling account</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="index.php"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>My selling account</span>
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

        <!-- account-area-start -->
        <div class="account-area mt-70 mb-70">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="basic-login">
                            <h5><?php echo $isSeller ? 'Update Seller Information' : 'Register as Seller'; ?></h5>
                            <form  method="POST">

                                    <!-- Display user info if user is not already a seller -->
                                    <label for="bio">Bio <span>*</span></label>
                                    <br>
                                    <textarea id="bio" name="bio" class="form-input" placeholder="Enter Bio" required style="width: 100%; height: fit-content;"></textarea>
                                    <br>
                                    <label for="cni">CNI <span>*</span></label>
                                    <input id="cni" name="cni" type="text" class="form-input" placeholder="Enter CNI" required>

                                    <label for="phone">Phone</label>
                                    <input id="phone" name="phone" type="text" class="form-input" placeholder="Enter Phone Number" value="<?php if($user['phone']){echo htmlspecialchars($user['phone']);} ?>">

                                    <label for="address">Address</label>
                                    <input id="address" name="address" type="text" class="form-input" placeholder="Enter Address" value="<?php if($user['address']){echo htmlspecialchars($user['address']);} ?>">


                                <div class="login-action mb-10 fix">
                                    <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#">privacy policy</a>.</p>
                                </div>
                                <button type="submit" class="tp-in-btn w-100">Submit</button>
                            </form>
                            <?php
                            if (isset($_SESSION['error_message_r'])) {
                                echo "<p class='error-message'>" . $_SESSION['error_message_r'] . "</p>";
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
                            <p>Join 60.000+ subscribers and get a new discount coupon on every Saturday.</p>
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
    <?php include 'php/footer.php' ?>





</body>


</html>
