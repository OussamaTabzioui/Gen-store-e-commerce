<?php include 'php/user.php'; ?>
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
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="light-bg-s">




    <!-- header-start -->
    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">My products</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="index.php"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>My products</span>
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

        <!-- inserting selling page -->
        <div class="account-area mt-70 mb-70 d-flex justify-content-center " style="width: 90%;">
            <div class="d-flex justify-content-center align-items-center flex-column " style="width: 100%;">
                <section class="recomand-product-area  pt-50 pb-15" style="width: 100%;">
                    <div class="container custom-conatiner" style="width: 90%;">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-xl-12">
                                <div class="section__head d-flex justify-content-between mb-30">
                                    <div class="section__title section__title-2">
                                        <h5 class="st-titile">YOUR STACK</h5>
                                    </div>
                                    <div class="button-wrap button-wrap-2">
                                        <a href="insert_product-page.php">Add more products <i class="fal fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <?php foreach ($products_seller as $product): ?>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item product__item-d">
                                        <div class="product__thumb fix">
                                            <div class="product-image w-img" style="width: auto; height: auto;">
                                                <a href="product-details.php?id=<?= $product['id_p'] ?>" class="product-image w-img d-flex justify-content-center align-items-center">
                                                    <img src="<?= $product['image_url1'] ?>" alt="product" style="width: 180px; height: 180px; object-fit:contain;">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product__content-3">
                                            <h6><a href="product-details.php?id=<?= $product['id_p'] ?>"><?= htmlspecialchars($product['name']) ?></a></h6>
                                            <div class="rating mb-5">
                                                <ul>
                                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                                        <li><a href="#"><i class="fal fa-star<?= $i < $product['rate'] ? '' : '-o' ?>"></i></a></li>
                                                    <?php endfor; ?>
                                                </ul>
                                                <span>(01 review)</span>
                                            </div>
                                            <div class="price mb-10">
                                                <span>$<?= htmlspecialchars($product['price']) ?></span>
                                            </div>
                                        </div>
                                        <div class="product__add-cart-s text-center">
                                            <div class="product__add-cart-s text-center">
                                                <a href="update_product.php?id=<?= $product['id_p'] ?>" class="btn cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                    Edit product
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        </div>

        <!-- cta-area-end -->

    </main>



    <!-- footer-start -->

    <?php include 'php/footer.php' ?>

    <!-- footer-end -->

    <!-- JS here -->

</body>

</html>
