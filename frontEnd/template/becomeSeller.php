<?php
include 'php/user.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become Partner</title>
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
    <style>
        section .page-banner-content {
            background-color: #f7f7f7;
            /* light gray background */
            padding: 20px;
        }

        section .breadcrumb-two {
            margin-top: 20px;
        }

        section .basic-login {
            margin-bottom: 20px;
        }

        section .btn-rounded {
            border-radius: 10px;
        }

        section .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        section .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-out;
            visibility: hidden;
        }

        .fade-in {
            opacity: 1;
            transition: opacity 0.5s ease-in;
            visibility: visible;
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
                            <h4 class="breadcrumb-title">Becomimg a Partner</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="index.php"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Becoming a Partner</span>
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
        <div class="faq-area mt-70 mb-60">
            <div class="container" style="width: 100%; min-height: 40vh;">
                <div class="page-banner-content text-center" id="banner-content">
                    <h4 class="breadcrumb-title" style="color: #333;">Are you ready to be our partner?</h4>
                    <div class="breadcrumb-two d-flex justify-content-center">
                        <nav class="row" style="width: 30%;">
                            <div class="col-lg-6">
                                <div class="basic-login mb-50">
                                    <a href="index.php" class="btn btn-danger btn-rounded" style="padding: 10px 20px;">Return Home</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="basic-login mb-50">
                                    <button class="btn btn-success btn-rounded" style="padding: 10px 20px;" id="begin-btn">Let's Begin</button>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row" style="display: none;" id="hidden-content">
                    <div class="col-lg-6">
                        <div class="single-faqs mb-40">
                            <div class="faq-title">
                                <h5>Infos About Questions</h5>
                            </div>
                            <div class="faq-content mt-10">
                                <div class="accordion" id="accordionExample1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                What details and specifications should be included for each product?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Understanding the necessary product information ensures that each listing is complete and accurate. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                How will you manage inventory and handle stock updates?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Knowing how inventory will be managed helps integrate their system with your website to maintain accurate stock levels.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                What are your payment processing and shipping requirements?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Clarifying these requirements ensures that the payment and shipping systems are set up according to the partner’s needs. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-faqs mb-40">
                            <div class="faq-title">
                                <h5>Answer Question Here : </h5>
                            </div>
                            <div class="faq-content mt-10">
                                <div class="accordion" id="accordionExample2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                                What is the rules of Payment?
                                            </button>
                                        </h2>
                                        <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="basic-login">
                                                    <input id="reg-answer1" name="answer1" type="text" placeholder=" Products should include a title, detailed description, high-quality images, price, and any relevant attributes." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading2">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapseTwo">
                                                How will you manage inventory and handle stock updates?
                                            </button>
                                        </h2>
                                        <div id="collapse2" class="accordion-collapse collapse show" aria-labelledby="heading2" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="basic-login">
                                                    <input id="reg-answer2" name="answer2" type="text" placeholder="  The partner will provide stock levels through an API or manual updates, which will be automatically synchronized with the website." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                                What are your payment processing and shipping requirements?
                                            </button>
                                        </h2>
                                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="basic-login">
                                                    <input id="reg-answer3" name="answer3" type="text" placeholder=" The partner prefers to use PayPal for payment processing and requires integration with a specific shipping carrier for order fulfillment." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="basic-login mb-50">
                            <a href="become-seller.php" class="btn btn-success btn-rounded" style="padding: 10px 20px;" id="begin-btn2">Let's be partners</a>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </section>

    <?php include 'php/footer.php' ?>
    <script>
        document.getElementById('begin-btn').addEventListener('click', function() {
            var bannerContent = document.getElementById('banner-content');
            var hiddenContent = document.getElementById('hidden-content');

            // Add fade-out class to hide the first div
            bannerContent.classList.add('fade-out');

            // Show the second div with fade-in effect
            hiddenContent.style.display = '';
            hiddenContent.classList.add('fade-in');

            // Optional: Delay to ensure fade-out completes before removing the element
            setTimeout(function() {
                bannerContent.style.display = 'none';
            }, 500); // Match the duration of the fade-out transition
        });
        document.getElementById('begin-btn2').addEventListener('click', function() {
            var bannerContent = document.getElementById('hidden-content');
            var hiddenContent = document.getElementById('hidden-content2');

            // Add fade-out class to hide the first div
            bannerContent.classList.add('fade-out');

            // Show the second div with fade-in effect
            hiddenContent.style.display = 'flex';
            hiddenContent.classList.add('fade-in');

            // Optional: Delay to ensure fade-out completes before removing the element
            setTimeout(function() {
                bannerContent.style.display = 'none';
            }, 500); // Match the duration of the fade-out transition
        });
    </script>

</body>

</html>
