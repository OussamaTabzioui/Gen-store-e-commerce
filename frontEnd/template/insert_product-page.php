<?php include 'php/user.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Product</title>
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
        .drop-zone {
            width: 100%;
            height: 100px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
            text-align: center;
            cursor: pointer;
        }

        .drop-zone:hover {
            background-color: #f5f5f5;
        }

        .account-area {
            max-width: 800px;
            margin: 70px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .account-area h2 {
            margin-top: 0;
        }

        .needs-validation {
            width: 100%;
        }

        .form-row {
            margin-bottom: 20px;
            width: 100%;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            text-align: center;
        }

        .form-control {
            height: 40px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
        }

        .form-control:focus {
            border-color: #aaa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .drop-zone {
            border: 2px dashed #ccc;
            padding: 20px;
            margin-bottom: 20px;
            font-size: 16px;
            color: #666;
        }

        .drop-zone:hover {
            border-color: #aaa;
        }

        .tp-in-btn {
            height: 40px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            background-color: #337ab7;
            color: #fff;
            cursor: pointer;
        }

        .tp-in-btn:hover {
            background-color: #23527c;
        }

        .alert {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .alert-danger {
            border-color: #d9534f;
            background-color: #f2dede;
            color: #a94442;
        }

        .close {
            float: right;
            font-size: 21px;
            font-weight: bold;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            filter: alpha(opacity=20);
            opacity: .2;
        }

        .close:hover {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            filter: alpha(opacity=50);
            opacity: .5;
        }
    </style>
</head>

<body>
    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Insert product</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="seller.php"><span>My products</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Insert product</span>
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
        <div class="container account-area mt-70 mb-70">
            <h2 class="text-center mb-4">Add a New Product</h2>
            <?php if (isset($_GET['error']) && $_GET['error'] == 'product_name_exists') { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Product name already exists, please choose a different name.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <form action="insert_product.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-row">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <div class="invalid-feedback">Please enter a product name.</div>
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="form-row" style="display: flex; flex-direction:column; justify-content: center; text-align: center;">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control" style="width: 100%;">
                        
                        <?php foreach (get_categories() as $cat): ?>
                            <option value="<?= $cat['id_c'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                        <?php endforeach; ?>
                    </select>


                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    <div class="invalid-feedback">Please enter a price.</div>
                </div>
                <div class="form-row">

                    <label for="image1" class="form-label">Image URL (main)</label>
                    <input type="file" id="image1" name="image1" required>
                    <div id="drop-zone-1" class="drop-zone">Drag and drop image here</div>

                    <label for="image2" class="form-label">Image URL (sec1)</label>
                    <input type="file" id="image2" name="image2">
                    <div id="drop-zone-2" class="drop-zone">Drag and drop image here</div>
                </div>
                <div class="form-row">

                    <label for="image3" class="form-label">Image URL (sec2)</label>
                    <input type="file" id="image3" name="image3">
                    <div id="drop-zone-3" class="drop-zone">Drag and drop image here</div>


                    <label for="discount" class="form-label">Discount (%)</label>
                    <input type="number" class="form-control" id="discount" name="discount">
                </div>
                <div class="form-row">

                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock">

                </div>
                <button type="submit" class="btn tp-in-btn w-100 btn-primary">Add Product</button>
            </form>
        </div>

    </main>

    <?php include 'php/footer.php' ?>

    <script>
        const dropZones = document.querySelectorAll('.drop-zone');

        dropZones.forEach((dropZone) => {
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('hover');
            });

            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('hover');
            });

            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                const files = e.dataTransfer.files;
                const input = dropZone.previousElementSibling;
                input.files = files;
                const formData = new FormData();
                formData.append('image', files[0]);
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '/upload-image', true);
                xhr.onload = () => {
                    if (xhr.status === 200) {
                        console.log('Image uploaded successfully');
                    } else {
                        console.error('Error uploading image');
                    }
                };
                xhr.send(formData);
            });
        });
    </script>



</body>

</html>
