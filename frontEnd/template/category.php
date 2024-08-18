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
    <style>
        .category-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .slider-area {
            max-width: 100%;
            /* add this line */
            margin: 0 auto;
            padding: 50px 0;
            /* add this line to center the section */
        }

        .category-item {
            background-color: #fff;
            /* width: 220%; */
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .category-image {
            margin-bottom: 10px;
        }

        .category-image img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .category-content {
            padding: 10px;
        }

        .category-content h6 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .category-content p {
            font-size: 14px;
            color: #666;
        }
    </style>
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
    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Categories</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="index.php"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Categories</span>
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
    </main>




    <section>
        <div class="slider-area light-bg-s pt-60">
            <div class="container custom-container" style="width: 100%">
                <div class="row" style="width: 100%">
                    <div class="col-xl-5" style="width: 100%">
                        <div class="category-grid" style="width: 100%">
                            <?php foreach ($categories as $category): ?>
                                <div class="category-item">
                                    <div class="category-image">
                                        <a href="search.php?category=<?php echo urlencode($category['name']); ?>">
                                            <img src="<?php echo $category['image']; ?>" alt="<?php echo $category['name']; ?>">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h6><a href="search.php?category=<?php echo urlencode($category['name']); ?>"><?php echo $category['name']; ?></a></h6>
                                        <p><?php echo $category['description']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php include 'php/footer.php' ?>

</body>

</html>
