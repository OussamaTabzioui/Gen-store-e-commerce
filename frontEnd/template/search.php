<?php
// Include database connection
include 'php/user.php';

// Retrieve search query and category from GET parameters
$query = isset($_GET['query']) ? $_GET['query'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Define the number of results per page
$resultsPerPage = 20;

// Get the current page number from the query parameter; default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query based on the current page
$offset = ($page - 1) * $resultsPerPage;

// Prepare the base SQL query to fetch products with search filters
$sql = "SELECT p.*, c.name as category_name
        FROM products p
        JOIN category c ON p.id_c = c.id_c
        WHERE p.name LIKE :query";

// Prepare the base SQL query to count total results with the same filters
$countSql = "SELECT COUNT(*) as total
             FROM products p
             JOIN category c ON p.id_c = c.id_c
             WHERE p.name LIKE :query";

// Append category filter to SQL queries if a category is selected
if (!empty($category)) {
    $sql .= " AND c.name = :category";
    $countSql .= " AND c.name = :category";
}

try {
    // Prepare and execute the count query to get the total number of results
    $countStmt = $pdo->prepare($countSql);
    $countStmt->bindValue(':query', '%' . $query . '%');
    if (!empty($category)) {
        $countStmt->bindValue(':category', $category);
    }
    $countStmt->execute();
    $totalCount = $countStmt->fetchColumn(); // Get the total count of matching products

    // Prepare the main query to fetch products with the applied filters
    $sql .= " ORDER BY p.sells DESC, p.stock ASC
              LIMIT :limit OFFSET :offset"; // Order by sells and stock, apply pagination

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':query', '%' . $query . '%');
    if (!empty($category)) {
        $stmt->bindValue(':category', $category);
    }
    $stmt->bindValue(':limit', $resultsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch the matching products
} catch (PDOException $e) {
    // Handle and display any database errors
    echo "Error: " . $e->getMessage();
}

// Calculate the total number of pages based on the total count of results
$totalPages = ceil($totalCount / $resultsPerPage);
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

    <?php include 'php/header.php'; ?>
    <main>
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
                        <p class="breadcrumb-item active" style="padding: 10px; ">Search Results for "<?php echo htmlspecialchars($query); ?>"</p>

                    </div>
                </div>
            </div>
        </section>
        <div class="shop-area mb-20">
            <div class="container  ">
                <div class="row d-flex justify-content-center ">


                    <div class="col-xl-9 col-lg-8 ">

                        <div class="product-lists-top ">
                            <div class="product__filter-wrap ">
                                <div class="row align-items-center text-center d-flex justify-content-center flex-column">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        <div class="product__filter d-sm-flex align-items-center justify-content-center">

                                            <div class="product__result pl-60">
                                                <p>Showing 1-<?php echo min($resultsPerPage, $totalCount); ?> of <?php echo $totalCount; ?> results</p>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="tab-content" id="productGridTabContent">
                            <div class="tab-pane fade show active" id="FourCol" role="tabpanel" aria-labelledby="FourCol-tab">
                                <div class="tp-wrapper">
                                    <div class="row g-0">
                                        <?php if (empty($products)): ?>
                                            <p>No products found.</p>
                                        <?php else: ?>
                                            <?php foreach ($products as $product): ?>
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                    <div class="product__item product__item-d">
                                                        <div class="product__thumb fix">
                                                            <div class="product-image w-img" style="width: auto; height: auto;">
                                                                <a href="product-details.php?id=<?= htmlspecialchars($product['id_p']) ?>" class="product-image w-img d-flex justify-content-center align-items-center">
                                                                    <img src="<?= htmlspecialchars($product['image_url1']) ?>" alt="product" style="width: 180px; height: 180px; object-fit:contain;">
                                                                </a>
                                                            </div>
                                                            <div class="product-action">

                                                                <form method="POST" action="php/process_wishlist.php">
                                                                    <input type="hidden" name="product_id" value="<?php echo $product['id_p']; ?>">
                                                                    <button type="submit" name="add_to_wishlist" class="icon-box icon-box-1">
                                                                        <i class="fal fa-heart"></i>
                                                                        <i class="fal fa-heart"></i>
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </div>
                                                        <div class="product__content-3">
                                                            <h6><a href="product-details.php?id=<?= htmlspecialchars($product['id_p']) ?>"><?= htmlspecialchars($product['name']) ?></a></h6>
                                                            <div class="rating mb-5">
                                                                <ul>
                                                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                                                        <li><a href="#"><i class="fal fa-star<?= $i < $product['rate'] ? '' : '-o' ?>"></i></a></li>
                                                                    <?php endfor; ?>
                                                                </ul>
                                                                <span>(01 review)</span>
                                                            </div>
                                                            <div class="price mb-10">
                                                                <span>$<?= htmlspecialchars(number_format($product['price'], 2)) ?></span>
                                                            </div>
                                                        </div>
                                                        <form method="POST" action="php/user.php">
                                                            <div class="product__add-cart-s text-center">
                                                                <input type="hidden" name="product_id" value="<?php echo $product['id_p']; ?>">
                                                                <input type="hidden" name="add_to_cart" value="1">
                                                                <button type="submit" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                                    Add to Cart
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination (if needed) -->
                        <div class="tp-pagination text-center">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="basic-pagination pt-30 pb-30">
                                        <nav>
                                            <ul>
                                                <?php if ($page > 1): ?>
                                                    <li><a href="?page=<?= $page - 1 ?>"><i class="fal fa-angle-double-left"></i></a></li>
                                                <?php endif; ?>
                                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                                    <li><a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a></li>
                                                <?php endfor; ?>
                                                <?php if ($page < $totalPages): ?>
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
        </div>
    </main>
    <?php include 'php/footer.php'; ?>


</body>

</html>
