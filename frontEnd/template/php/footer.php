<?php
if (isset($_GET['error'])) {
    $error_message = urldecode($_GET['error']);
    echo '<section class="errorSection d-flex align-items-center justify-content-center" style="width:100%;height: 40px;background-color: red;color: white; " > <div class="error-message"> ', $error_message, '</div> </section>';
}
?>



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
<footer id="footer">
    <div class="fotter-area d-ddark-bg">
        <div class="footer__top pt-80 pb-15">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-4 order-last-md">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="footer__widget">
                                    <div class="footer__widget-title">
                                        <h4>Customer Care</h4>
                                    </div>
                                    <div class="footer__widget-content">
                                        <div class="footer__link">
                                            <ul>
                                                <li><a href="faq.php">New Customers</a></li>
                                                <li><a href="faq.php">How to use Account</a></li>
                                                <li><a href="faq.php">Placing an Order</a></li>
                                                <li><a href="faq.php">Payment Methods</a></li>
                                                <li><a href="faq.php">Delivery &amp; Dispatch</a></li>
                                                <li><a href="faq.php">Problems with Order</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="footer__widget">
                                    <div class="footer__widget-title">
                                        <h4>Customer Service</h4>
                                    </div>
                                    <div class="footer__widget-content">
                                        <div class="footer__link">
                                            <ul>
                                                <li><a href="faq.php">Help Center</a></li>
                                                <li><a href="faq.php">Contact Us</a></li>
                                                <li><a href="faq.php">Report Abuse</a></li>
                                                <li><a href="faq.php">Submit a Dispute</a></li>
                                                <li><a href="faq.php">Policies &amp; Rules</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-8 order-first-md">
                        <div class="footer__top-left">
                            <div class="row">

                                <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="footer__widget">
                                                <div class="footer__widget-title">
                                                    <h4>My Account</h4>
                                                </div>
                                                <div class="footer__widget-content">
                                                    <div class="footer__link">
                                                        <ul>
                                                            <li><a href="faq.php">Product Support</a></li>
                                                            <?php if (!isUserSeller($username)): ?>
                                                                <li><a href="becomeSeller.php">Be Seller</a></li>
                                                            <?php endif; ?>
                                                            
                                                            <li><a href="cart.php">Shopping Cart</a></li>
                                                            <li><a href="wishlist.php">Wishlist</a></li>
                                                            <li><a href="faq.php">Terms &amp; Conditions &amp;</a></li>
                                                            <li><a href="faq.php">Redeem Voucher</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="footer__widget">
                                                <div class="footer__widget-title">
                                                    <h4>Quick Links</h4>
                                                </div>
                                                <div class="footer__widget-content">
                                                    <div class="footer__link">
                                                        <ul>
                                                            <li><a href="contact.php">Store Location</a></li>
                                                            <li><a href="my-account.php">My account</a></li>
                                                            <li><a href="contact.php">Order Tracking</a></li>
                                                            <li><a href="faq.php">FAQs</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6">
                                    <div class="footer__widget">
                                        <div class="footer__widget-title mb-20">
                                            <h4>About The Store</h4>
                                        </div>
                                        <div class="footer__widget-content">
                                            <p class="footer-text mb-35">Our mission statement is to provide the absolute best customer experience available in the Electronic industry without exception.</p>
                                            <div class="footer__hotline d-flex align-items-center mb-10">
                                                <div class="icon mr-15">
                                                    <i class="fal fa-headset"></i>
                                                </div>
                                                <div class="text">
                                                    <h4>Got Question? Call us 24/7!</h4>
                                                    <span><a href="tel:100-123-456-7890">(+100) 123 456 7890</a></span>
                                                </div>
                                            </div>
                                            <div class="footer__info">
                                                <ul>
                                                    <li>
                                                        <span>Add: <a target="_blank" href="https://goo.gl/maps/c82DDZ8ALvL878Bv8">Walls Street 68, Mahattan, New York, USA</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- !!!!!!!!! -->
        <div class="footer__bottom-2">
            <div class="container custom-conatiner">
                <div class="footer__bottom-content footer__bottom-content-2 pt-50 pb-50">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer__links footer__links-d text-center mb-25">
                                <p>
                                    <a href="about.php">About Us</a>
                                    <a href="contact.php">Delivery & Return</a>
                                    <a href="faq.php">Privacy Policy</a>
                                    <a href="faq.php">Help</a>
                                    <a href="contact.php">Order Tracking</a>
                                    <a href="contact.php">Contact Us</a>
                                    <a href="faq.php">FAQs </a>
                                </p>
                            </div>
                            <div class="payment-image text-center mb-25">
                                <a href="#"><img src="assets/img/payment/payment.png" alt=""></a>
                            </div>
                            <div class="copy-right-area copy-right-area-2 text-center">
                                <p>Copyright © <span>Gen-store.</span> All Rights Reserved. Powered by <a href="#"><span class="main-color">Theme_Pure.</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.querySelector('.quantity-input');
        const incrementButton = document.querySelector('.inc');
        const decrementButton = document.querySelector('.dec');

        incrementButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value, 10);
            let maxValue = parseInt(quantityInput.max, 10);
            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
            }
        });

        decrementButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value, 10);
            let minValue = parseInt(quantityInput.min, 10);
            if (currentValue > minValue) {
                quantityInput.value = currentValue - 1;
            }
        });

        // Optional: To ensure the input value does not exceed max or go below min
        quantityInput.addEventListener('input', function() {
            let currentValue = parseInt(quantityInput.value, 10);
            let minValue = parseInt(quantityInput.min, 10);
            let maxValue = parseInt(quantityInput.max, 10);
            if (currentValue < minValue) {
                quantityInput.value = minValue;
            } else if (currentValue > maxValue) {
                quantityInput.value = maxValue;
            }
        });
    });
</script>

<script src="assets/js/vendor/jquery.js"></script>
<script src="assets/js/vendor/waypoints.js"></script>
<script src="assets/js/bootstrap-bundle.js"></script>
<script src="assets/js/meanmenu.js"></script>
<script src="assets/js/swiper-bundle.js"></script>
<script src="assets/js/tweenmax.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/magnific-popup.js"></script>
<script src="assets/js/parallax.js"></script>
<script src="assets/js/backtotop.js"></script>
<script src="assets/js/nice-select.js"></script>
<script src="assets/js/countdown.min.js"></script>
<script src="assets/js/counterup.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/isotope-pkgd.js"></script>
<script src="assets/js/imagesloaded-pkgd.js"></script>
<script src="assets/js/ajax-form.js"></script>
<script src="assets/js/main.js"></script>
