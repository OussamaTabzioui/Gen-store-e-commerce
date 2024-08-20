<?php
include 'php/user.php';
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get product ID from URL
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Fetch product details
    $stmt = $pdo->prepare("
            SELECT p.*,
                   c.name AS category_name,
                   s.username AS seller_username,
                   s.profile_pic AS seller_profile_pic
            FROM products p
            LEFT JOIN category c ON p.id_c = c.id_c
            LEFT JOIN seller s ON p.id_s = s.id_s
            WHERE p.id_p = ?
        ");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "Product not found";
        exit();
    }
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
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


    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->

    <!-- header-start -->
    <?php include 'php/header.php'; ?>
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
        <!-- breadcrumb__area-start -->
        <section class="breadcrumb__area box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product : <?php echo htmlspecialchars($product['id_p']); ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->

        <!-- product-details-start -->
        <div class="product-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product__details-nav d-sm-flex align-items-start">
                            <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab" role="tablist">
                                <?php
                                // Display product images dynamically
                                $images = [$product['image_url1'], $product['image_url2'], $product['image_url3']];
                                foreach ($images as $index => $image) {
                                    $active = $index === 0 ? 'active' : '';
                                    echo '<li class="nav-item" role="presentation">
                                    <button class="nav-link ' .
                                        $active .
                                        '" id="thumb' .
                                        ($index + 1) .
                                        '-tab" data-bs-toggle="tab" data-bs-target="#thumb' .
                                        ($index + 1) .
                                        '" type="button" role="tab" aria-controls="thumb' .
                                        ($index + 1) .
                                        '" aria-selected="' .
                                        ($index === 0 ? 'true' : 'false') .
                                        '">
                                        <img src="' .
                                        htmlspecialchars($image) .
                                        '" alt="No image" style="width: 90px;">
                                    </button>
                                  </li>';
                                }
                                ?>
                            </ul>
                            <div class="product__details-thumb">
                                <div class="tab-content" id="productThumbContent">
                                    <?php foreach ($images as $index => $image) {
                                        $active = $index === 0 ? 'show active' : '';
                                        echo '<div class="tab-pane fade ' .
                                            $active .
                                            '" id="thumb' .
                                            ($index + 1) .
                                            '" role="tabpanel" aria-labelledby="thumb' .
                                            ($index + 1) .
                                            '-tab">
                                        <div class="product__details-nav-thumb w-img">
                                            <img src="' .
                                            htmlspecialchars($image) .
                                            '" alt="" style="width: 500px; margin: 0 0 0 40px;">
                                        </div>
                                      </div>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product__details-content">
                            <h6><?php echo htmlspecialchars($product['name']); ?></h6>
                            <div class="pd-rating mb-10">
                                <ul class="rating">
                                    <?php
                                    // Display product rating if available
                                    $rating = $product['rating'] ?? 0; // Assuming you have a rating field in your products table
                                    for ($i = 1; $i <= 5; $i++) {
                                        $active = $i <= $rating ? 'fa-star' : 'fa-star-o';
                                        echo '<li><a href="#"><i class="fal ' . $active . '"></i></a></li>';
                                    }
                                    ?>
                                </ul>
                                <span>(01 review)</span>
                                <span><a href="#">Add your review</a></span>
                            </div>
                            <div class="price mb-10">
                                <span>$<?php echo number_format($product['price'], 2); ?></span>
                            </div>
                            <div class="features-des mb-20 mt-10">
                                <ul>
                                    <?php
                                    // Display product features if available
                                    $features = explode(';', $product['description']); // Assuming description includes features separated by semicolons
                                    foreach ($features as $feature) {
                                        echo '<li><a href="#"><i class="fas fa-circle"></i> ' . htmlspecialchars($feature) . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <form method="POST" action="php/add_to_cart.php">
                                <div class="product-stock mb-20">
                                    <h5>Availability: <span><?php echo htmlspecialchars($product['stock']); ?> in stock</span></h5>
                                </div>
                                <div class="cart-option mb-15">
                                    <div class="product-quantity mr-20">
                                        <div class="cart-plus-minus p-relative">
                                            <div class="dec qtybutton">-</div>
                                            <input type="text" class="quantity-input" name="quantity" value="1" min="<?php echo htmlspecialchars($product['stock']); ?>" max="">
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_p" value="<?php echo $product['id_p']; ?>">
                                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['user_id']; ?>"> <!-- Ensure this is set correctly -->
                                    <button type="submit" class="cart-btn">Add To Cart</button>
                                </div>
                            </form>

                            <div class="details-meta">
                                <div class="d-meta-left">

                                    <div class="dm-item mr-20">
                                        <form method="POST" action="php/process_wishlist.php">
                                            <input type="hidden" name="product_id" value="<?php echo $product['id_p']; ?>">

                                            <button type="submit" name="add_to_wishlist">
                                                <i class="fal fa-heart"></i> Add to wishlist
                                            </button>
                                        </form>

                                    </div>

                                </div>
                                <div class="d-meta-left">
                                    <div class="dm-item">
                                        <a href="" share><i class="fal fa-share-alt"></i>Share</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tag-area mt-15">
                                <div class="product_info">
                                    <span class="sku_wrapper">
                                        <span class="title">SKU:</span>
                                        <span class="sku"><?php echo htmlspecialchars($product['id_p']); ?></span>
                                    </span>
                                    <span class="posted_in">
                                        <span class="title">Category:</span>
                                        <a href="search.php?category=<?php echo urlencode($product['category_name']); ?>"><?php echo htmlspecialchars($product['category_name']); ?></a>
                                    </span>
                                    <span class="tagged_as">
                                        <span class="title">Seller:</span>
                                        <a href="seller_profile.php?seller_name=<?php echo htmlspecialchars($product['seller_username']); ?>">
                                            <?php echo htmlspecialchars($product['seller_username']); ?>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- product-details-end -->

        <!-- product-details-des-start -->
        <div class="product-details-des mt-40 mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="product__details-des-tab">
                            <ul class="nav nav-tabs" id="productDesTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="true">Description </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="aditional-tab" data-bs-toggle="tab" data-bs-target="#aditional" type="button" role="tab" aria-controls="aditional" aria-selected="false">Additional information</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Reviews (1) </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="prodductDesTaContent">
                    <div class="tab-pane fade active show" id="des" role="tabpanel" aria-labelledby="des-tab">
                        <div class="product__details-des-wrapper">
                            <h6 class="des-sm-title"><?php echo htmlspecialchars($product['name']); ?> </h6>
                            <p><?php echo htmlspecialchars($product['description']); ?> </p>
                            <p class="des-text mb-35">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque eaque, maiores pariatur incidunt tenetur neque? Voluptatem nobis quos accusantium corporis iusto rem voluptatum tempore exercitationem perspiciatis quae veritatis, voluptatibus eos, quod, maxime architecto reiciendis natus officiis illo quaerat? Maxime repellat obcaecati officia neque commodi, pariatur nulla? Nam asperiores temporibus autem nihil hic. Explicabo nam, veniam voluptatum, doloremque placeat quo quam aliquid eos asperiores dolore sunt culpa libero. Consequatur consequuntur cumque nobis mollitia excepturi tempore nemo obcaecati vero temporibus autem quo illum tempora culpa nihil totam aliquam, iusto expedita commodi praesentium voluptatibus necessitatibus? Doloremque adipisci nesciunt, molestias illum quis ducimus.</p>
                            <div class="features-des-image text-center">
                                <img src="<?php echo htmlspecialchars($product['image_url1']); ?>" alt="">
                            </div>




                        </div>
                    </div>
                    <div class="tab-pane fade" id="aditional" role="tabpanel" aria-labelledby="aditional-tab">
                        <div class="product__desc-info">
                            <ul>
                                <li>
                                    <h6>Weight</h6>
                                    <span>2 lbs</span>
                                </li>
                                <li>
                                    <h6>Dimensions</h6>
                                    <span>12 × 16 × 19 in</span>
                                </li>
                                <li>
                                    <h6>Product</h6>
                                    <span>Purchase this product on rag-bone.com</span>
                                </li>
                                <li>
                                    <h6>Color</h6>
                                    <span>Gray, Black</span>
                                </li>
                                <li>
                                    <h6>Size</h6>
                                    <span>S, M, L, XL</span>
                                </li>
                                <li>
                                    <h6>Model</h6>
                                    <span>Model </span>
                                </li>
                                <li>
                                    <h6>Shipping</h6>
                                    <span>Standard shipping: $5,95</span>
                                </li>
                                <li>
                                    <h6>Care Info</h6>
                                    <span>Machine Wash up to 40ºC/86ºF Gentle Cycle</span>
                                </li>
                                <li>
                                    <h6>Brand</h6>
                                    <span>Kazen</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="product__details-review">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="review-rate">
                                        <h5>5.00</h5>
                                        <div class="review-star">
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </div>
                                        <span class="review-count">01 Review</span>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="review-des-infod">
                                        <h6>1 review for "<span>Wireless Bluetooth Over-Ear Headphones</span>"</h6>
                                        <div class="review-details-des">
                                            <div class="author-image mr-15">
                                                <a href="#"><img src="assets/img/author/author-sm-1.jpg" alt=""></a>
                                            </div>
                                            <div class="review-details-content">
                                                <div class="str-info">
                                                    <div class="review-star mr-15">
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                    </div>
                                                    <div class="add-review-option">
                                                        <a href="#">Add Review</a>
                                                    </div>
                                                </div>
                                                <div class="name-date mb-30">
                                                    <h6> admin – <span> May 27, 2021</span></h6>
                                                </div>
                                                <p>A light chair, easy to move around the dining table and about the room. Duis aute irure dolor in reprehenderit in <br> voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="product__details-comment ">
                                        <div class="comment-title mb-20">
                                            <h3>Add a review</h3>
                                            <p>Your email address will not be published. Required fields are marked *</p>
                                        </div>
                                        <div class="comment-rating mb-20">
                                            <span>Overall ratings</span>
                                            <ul>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="comment-input-box">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <div class="comment-input">
                                                            <input type="text" placeholder="Your Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <div class="comment-input">
                                                            <input type="email" placeholder="Your Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <textarea placeholder="Your review" class="comment-input comment-textarea"></textarea>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="comment-agree d-flex align-items-center mb-25">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Save my name, email, and website in this browser for the next time I comment.
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="comment-submit">
                                                            <button type="submit" class="cart-btn">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-details-des-end -->

        <!-- shop modal start -->

        <!-- shop modal end -->

    </main>

    <!-- footer-start -->
    <?php include 'php/footer.php' ?>





</body>

</html>
