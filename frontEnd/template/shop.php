<?php
// Include database connection
include 'php/user.php';

// Number of products per page
$products_per_page = 20;

// Get the current page number from the query parameter, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset
$offset = ($page - 1) * $products_per_page;

// Fetch products for the current page
$stmt = $pdo->prepare("
    SELECT p.*, c.name as category_name
    FROM products p
    JOIN category c ON p.id_c = c.id_c
    ORDER BY p.sells DESC , p.id_p Desc
    LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $products_per_page, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch total number of products for pagination
$stmt = $pdo->query("SELECT COUNT(*) FROM products");
$total_products = $stmt->fetchColumn();
$total_pages = ceil($total_products / $products_per_page);
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
        <!-- breadcrumb__area-start -->
        <section class="breadcrumb__area box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->

        <!-- shop-area-start -->
        <div class="shop-area mb-20">
            <div class="container  ">
                <div class="row d-flex justify-content-center">


                    <div class="col-xl-9 col-lg-8">

                        <div class="product-lists-top">
                            <div class="product__filter-wrap">
                                <div class="row align-items-center ext-center d-flex justify-content-center flex-column">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        <div class="product__filter d-sm-flex align-items-center justify-content-center">
                                            <div class="product__result pl-60">
                                                <p>Showing All Products</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Product Grid -->
                        <div class="tab-content" id="productGridTabContent">
                            <div class="tab-pane fade show active" id="FourCol" role="tabpanel" aria-labelledby="FourCol-tab">
                                <div class="tp-wrapper">
                                    <div class="row g-0">
                                        <?php foreach ($products as $product): ?>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                <div class="product__item product__item-d">
                                                    <div class="product__thumb fix">
                                                        <div class="product-image w-img" style="width: auto; height: auto;">
                                                            <a href="product-details.php?id=<?= $product['id_p'] ?>" class="product-image w-img d-flex justify-content-center align-items-center">
                                                                <img src="<?= $product['image_url1'] ?>" alt="product" style="width: 180px; height: 180px; object-fit:contain;">
                                                            </a>
                                                        </div>
                                                        <div class="product-action">
                                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="#" class="icon-box icon-box-1">
                                                                <i class="fal fa-heart"></i>
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                            <a href="#" class="icon-box icon-box-1">
                                                                <i class="fal fa-layer-group"></i>
                                                                <i class="fal fa-layer-group"></i>
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
                                                        <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                            Add to Cart
                                                        </button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="tp-pagination text-center">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="basic-pagination pt-30 pb-30">
                                        <nav>
                                            <ul>
                                                <?php if ($page > 1): ?>
                                                    <li><a href="?page=<?= $page - 1 ?>"><i class="fal fa-angle-double-left"></i></a></li>
                                                <?php endif; ?>
                                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                    <li><a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a></li>
                                                <?php endfor; ?>
                                                <?php if ($page < $total_pages): ?>
                                                    <li><a href="?page=<?= $page + 1 ?>"><i class="fal fa-angle-double-right"></i></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </main>

    <!-- footer-start -->

    <?php include 'php/footer.php' ?>

    <!-- footer-end -->

    <!-- JS here -->

</body>

<!-- Mirrored from wphix.com/template/Gen-store/Gen-store/shop.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 10:39:58 GMT -->

</html>
