<?php
include 'php/user.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page or handle the error
    header("Location: php/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Genstore";  // Use the correct database name without .db

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
$sql = "SELECT username, email, password, address, profile_pic,  phone FROM users WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $email, $plain_password, $address,   $profile_pic, $phone);
$stmt->fetch();
$stmt->close();

if (isUserSeller($username)) {
    $sql = "SELECT cni, bio FROM seller WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $seller_data = array();
    $stmt->bind_result($seller_data['cni'], $seller_data['bio']);
    $stmt->fetch();
    $stmt->close();
}

$conn->close();
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

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->


    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">My account</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="index.php"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>My account</span>
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
                <form action="update_profile.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="basic-login mb-50">
                                <h5>Profile Picture:</h5>
                                <img src="<?php echo htmlspecialchars($profile_pic); ?>" alt="<?php echo htmlspecialchars($profile_pic); ?>" id="imgCt" style="width: 100px; height: 100px; border: 2px solid black ;  border-radius: 100%; margin:  0 10px 10px 0 ">

                                <label for="images" class="drop-container" id="dropcontainer">
                                    <span class="drop-title">Drop files here</span>
                                    or
                                    <input type="file" id="images" accept="assets/img/author/*" name="profile_pic">
                                </label>

                                <h5>Username:</h5>
                                <input id="edit_name1" name="username" type="text" value="<?php echo htmlspecialchars($username); ?>" style="width: 300px; border: none; transform: translateY(10px);" readonly>

                                <h5>Email address:</h5>
                                <input id="edit_name2" name="email" type="text" value="<?php echo htmlspecialchars($email); ?>" style="width: 300px; border: none; transform: translateY(10px);" readonly>

                                <br>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="basic-login mb-50">
                                <h5>Password:</h5>
                                <div class="d-flex justify-content-between">
                                    <input id="edit_name3" name="password" type="password" value="<?php echo htmlspecialchars($plain_password); ?>" style="width: 300px; border: none; transform: translateY(10px);" readonly>
                                    <div class="checkbox-container d-flex">
                                        <input type="checkbox" onclick="myFunction()">
                                        <label for="showPassword" style="transform: translateY(-7px);">Show Password</label>
                                    </div>
                                </div>
                                <br>
                                <h5>Address:</h5>
                                <input id="edit_name4" name="address" type="text" value="<?php echo htmlspecialchars($address); ?>" style="width: 300px; border: none; transform: translateY(10px);" readonly>

                                <br>
                                <h5>Phone:</h5>
                                <input id="edit_name5" name="phone" type="text" value="<?php echo htmlspecialchars($phone); ?>" style="width: 300px; border: none; transform: translateY(10px);" readonly>
                                <?php if (isUserSeller($username)): ?>
                                    <br>

                                    <h5>CNI: </h5>
                                    <input id="edit_name6" type="text" name="cni" value="<?php echo htmlspecialchars($seller_data['cni']); ?>" style="width: 300px; border: none; transform: translateY(10px);" readonly>

                                    <h5>Bio: </h5>
                                    <textarea id="edit_name7" name="bio" style="width: 500px; border: none; transform: translateY(10px);" readonly><?php echo htmlspecialchars($seller_data['bio']); ?></textarea>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="tp-in-btn w-100" style="animation-delay: 1.15s; border: black solid 1px; margin: 10px 0;" onclick="editname()">Edit</button>
                    <button type="submit" class="tp-in-btn w-100">Save Changes</button>
                </form>
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





    <script>
        function editname() {
            document.getElementById('edit_name1').removeAttribute('readonly');
            document.getElementById('edit_name2').removeAttribute('readonly');
            document.getElementById('edit_name3').removeAttribute('readonly');
            document.getElementById('edit_name4').removeAttribute('readonly');
            document.getElementById('edit_name5').removeAttribute('readonly');
            document.getElementById('edit_name6').removeAttribute('readonly');
            document.getElementById('edit_name7').removeAttribute('readonly');
            var con = document.getElementById('dropcontainer');
            var img = document.getElementById('imgCt');
            con.style.display = 'flex';
            // img.style.margin = 50% ;
        }

        function myFunction() {
            var x = document.getElementById("edit_name3");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <?php include 'php/footer.php' ?>
</body>
</html>
