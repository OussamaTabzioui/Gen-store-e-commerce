<?php
include 'php/user.php';

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

        <!-- slider-area-start -->
        <div class="slider-area light-bg-s pt-60">
            <div class="container custom-conatiner">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="swiper-container slider__active pb-30">
                            <div class="slider-wrapper swiper-wrapper">
                                <div class="single-slider swiper-slide b-radius-2 slider-height-2 d-flex align-items-center" data-background="assets/img/slider/02-slide-1.jpg">
                                    <div class="slider-content slider-content-2">
                                        <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">Gaming Headset<br> Brilliant Lighting Effect</h2>
                                        <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">Discount 40% On Products & Free Shipping</p>
                                        <div class="slider-bottom-btn mt-65">
                                            <a data-animation="fadeInUp" data-delay="1.15s" href="shop.php" class="st-btn-border b-radius-2">Discover now</a>
                                        </div>
                                    </div>
                                </div><!-- /single-slider -->
                                <div class="single-slider swiper-slide b-radius-2 slider-height-2 d-flex align-items-center" data-background="assets/img/slider/02-slide-2.jpg">
                                    <div class="slider-content slider-content-2">
                                        <h2 data-animation="fadeInLeft" data-delay="1.5s" class="pt-15 slider-title pb-5">SALE 20% OFF<br> SAMSUNG GALAXY BUDS </h2>
                                        <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.7s">Discount 30% On Products & Free Shipping</p>
                                        <div class="slider-bottom-btn mt-65">
                                            <a data-animation="fadeInUp" data-delay="1.9s" href="shop.php" class="st-btn-border b-radius-2">Discover now</a>
                                        </div>
                                    </div>
                                </div><!-- /single-slider -->
                                <div class="single-slider b-radius-2 swiper-slide slider-height-2 d-flex align-items-center" data-background="assets/img/slider/02-slide-3.jpg">
                                    <div class="slider-content slider-content-2">
                                        <h2 data-animation="fadeInLeft" data-delay="1.5s" class="pt-15 slider-title pb-5">Sport Edition<br> Red Special Edition</h2>
                                        <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.8s">Wireless Connection With TV, Computer, Laptop... </p>
                                        <div class="slider-bottom-btn mt-65">
                                            <a data-animation="fadeInUp" data-delay="1.10s" href="shop.php" class="st-btn-border b-radius-2">Discover now</a>
                                        </div>
                                    </div>
                                </div><!-- /single-slider -->
                                <div class="main-slider-paginations"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="banner__item p-relative w-img mb-30">
                                    <div class="banner__img b-radius-2">
                                        <a href="product-details.php?id=1"><img src="assets/img/banner/banner-10.jpg" alt=""></a>
                                    </div>
                                    <div class="banner__content banner__content-2">
                                        <h6><a href="product-details.php?id=1">Canyon <br> Star Raider</a></h6>
                                        <p>Headphone & Audio</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="banner__item p-relative w-img mb-30">
                                    <div class="banner__img b-radius-2">
                                        <a href="product-details.php?id=1"><img src="assets/img/banner/banner-11.jpg" alt=""></a>
                                    </div>
                                    <div class="banner__content banner__content-2">
                                        <h6><a href="product-details.php?id=1">Phone <br> Galaxy S20</a></h6>
                                        <p>Cellphone & Tablets</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="banner__item p-relative w-img mb-30">
                                    <div class="banner__img b-radius-2">
                                        <a href="product-details.php?id=1"><img src="assets/img/banner/banner-13.jpg" alt=""></a>
                                    </div>
                                    <div class="banner__content banner__content-2">
                                        <h6><a href="product-details.php?id=1">Galaxy <br> Buds Plus</a></h6>
                                        <p>Headphone & Audio</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="banner__item p-relative w-img mb-30">
                                    <div class="banner__img b-radius-2">
                                        <a href="product-details.php?id=1"><img src="assets/img/banner/banner-12.jpg" alt=""></a>
                                    </div>
                                    <div class="banner__content banner__content-2">
                                        <h6><a href="product-details.php?id=1">Chair <br>Swoon Lounge</a></h6>
                                        <p>Headphone & Audio</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-area-end -->

        <!-- trending-product-area-start -->
        <section class="trending-product-area light-bg-s pt-25 pb-15">
            <div class="container custom-conatiner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-30">
                            <div class="section__title section__title-2">
                                <h5 class="st-titile">Hot Trending Products</h5>
                            </div>
                            <div class="button-wrap button-wrap-2">
                                <a href="shop.php">See All Product <i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($trendingProducts as $product) { ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
                            <div class="product__item product__item-2 b-radius-2 mb-20">
                                <div class="product__thumb fix">
                                    <div class="product-image w-img d-flex justify-content-center align-items-center" style="width: auto; height: auto; ">
                                        <a href="product-details.php?id=<?php echo $product['id_p']; ?>" class="product-image w-img d-flex justify-content-center align-items-center">
                                            <img src="<?php echo htmlspecialchars($product['image_url1']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width: 180px; height: 180px; object-fit:contain;">
                                        </a>
                                    </div>
                                    <?php if (isset($product['discount']) && $product['discount'] > 0) { ?>
                                        <div class="product__offer">
                                            <span class="discount">-<?php echo $product['discount']; ?>%</span>
                                        </div>
                                    <?php } ?>
                                    <div class="product-action product-action-2">
                                        <form method="POST" action="php/process_wishlist.php">
                                            <input type="hidden" name="product_id" value="<?php echo $product['id_p']; ?>">
                                            <button type="submit" name="add_to_wishlist" class="icon-box icon-box-1">
                                                <i class="fal fa-heart"></i>
                                                <i class="fal fa-heart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="product__content product__content-2">
                                    <h6><a href="product-details.php?id=<?php echo $product['id_p']; ?>"><?php echo htmlspecialchars($product['name']); ?></a></h6>
                                    <div class="rating mb-5 mt-10">
                                        <ul>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        </ul>
                                        <span>(01 review)</span>
                                    </div>
                                    <div class="price">
                                        <span>$<?php echo number_format($product['price'], 2); ?></span>
                                    </div>
                                </div>
                                <div class="product__add-cart text-center">
                                    <form method="POST" action="php/add_to_cart_index.php">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id_p']; ?>">
                                        <button type="submit" name="add_to_cart" class="cart-btn-3 w-100">
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- trending-product-area-end -->

        <!-- banner__area-start -->
        <section class="categories__area light-bg-s pt-20 pb-10">
            <div class="container custom-conatiner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-30">
                            <div class="section__title section__title-2">
                                <h5 class="st-titile">Popular Categories</h5>
                            </div>
                            <div class="button-wrap button-wrap-2">
                                <a href="category.php">See All Categories <i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $limit = 6; // Set the limit
                    $count = 0;?>
                    <?php foreach ($categories as $category ): ?>
                        <?php if ($count >= $limit) {
                                        break; // Exit the loop when the limit is reached
                                    }?>
                        <div class="col-xl-2 col-lg-3 col-md-4">
                            <div class="categories__item p-relative w-img mb-30">
                                <div class="categories__img b-radius-2">
                                    <a href="search.php?category=<?php echo urlencode($category['name']); ?>">
                                        <img src="<?php echo htmlspecialchars($category['image']); ?>" alt="<?php echo htmlspecialchars($category['name']); ?>">
                                    </a>
                                </div>
                                <div class="categories__content">
                                    <h6><a href="search.php?category=<?php echo urlencode($category['name']); ?>">
                                            <?php echo htmlspecialchars($category['name']); ?>
                                        </a></h6>
                                    <!-- Assuming you want to show the number of products, replace `0` with actual count -->
                                    <p>(<?php echo htmlspecialchars($category['product_count']); ?> Products)</p>
                                </div>
                            </div>
                        </div>
                        <?php  $count++ ;?>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <!-- banner__area-end -->

    </main>


    <?php include 'php/footer.php' ?>





</body>

</html>
