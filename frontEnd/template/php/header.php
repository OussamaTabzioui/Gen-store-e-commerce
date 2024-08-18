<?php include 'loading.php'; ?>
<header class="header d-blue-bg" id="header">

    <div class="header-mid">
        <div class="container custom-conatiner">
            <div class="heade-mid-inner">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                        <div class="header__info">
                            <div class="logo">
                                <a href="index.php" class="logo-image"><img src="assets/img/logo/logo1.svg" alt="logo"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                        <div class="header__search">
                            <form action="search.php" method="get">
                                <div class="header__search-box">
                                    <input class="search-input search-input-2" type="text" name="query" placeholder="I'm shopping for..." required>
                                    <button class="button button-2" type="submit"><i class="far fa-search"></i></button>
                                </div>
                                <div class="header__search-cat x2">
                                    <select name="category">
                                    <?php foreach (get_categories() as $cat): ?>
                            <option value="<?= $cat['name'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8">
                        <div class="header-action">

                            <div class="profile block-userlink block-cart action" id="profile-link">
                                <a class="icon-link icon-link-2 action" href="my-account-page.php">

                                    <i class="flaticon-user"></i>

                                    <span class="text">
                                        <span class="sub">My </span>
                                        Account
                                    </span>
                                </a>
                                <div class="cart">
                                    <div class="cart__mini">
                                        <ul>
                                            <li>
                                                <div class="cart__title d-flex justify-content-center flex-column align-items-center">
                                                    <h1 style=" font-size: 25px;">Profile</h1>
                                                    <img src="<?php echo htmlspecialchars($profile_pic); ?>" class="" style="width: 100px; height: 100px; border: 2px solid black ;  border-radius: 100%; margin:  10px 0 00px 0 ; ">
                                                    <span style=" font-size: 14px;"> <?php echo htmlspecialchars($username); ?></span>

                                                </div>
                                            </li>
                                            <li>
                                                <a href="my-account-page.php" class="wc-cart mb-10">view profile</a>
                                                <?php if (isUserSeller($username)): ?>
                                                    <a href="seller.php" class="wc-cart mb-10 ">My products</a>
                                                <?php else: ?>

                                                <?php endif; ?>
                                                <a href="php/logout.php" class="wc-checkout">log out</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- wishlist -->
                            <div class="block-wishlist action">
                                <a class="icon-link icon-link-2" href="wishlist.php">
                                    <i class="flaticon-heart"></i>
                                    <span class="count count-2"><?php echo htmlspecialchars($totalItemsW) ?></span>
                                    <span class="text">
                                        <span class="sub">Favorite</span>
                                        My Wishlist
                                    </span>
                                </a>

                            </div>
                            <!-- cart -->
                            <div class="block-cart action">
                                <a class="icon-link icon-link-2" href="cart.php">
                                    <i class="flaticon-shopping-bag"></i>
                                    <span class="count count-2"><?php echo htmlspecialchars($totalItems); ?></span>
                                    <span class="text">
                                        <span class="sub">Your Cart:</span>
                                        <?php echo htmlspecialchars('$' . number_format($totalPrice, 2)); ?>
                                    </span>
                                </a>
                                <div class="cart">
                                    <div class="cart__mini">
                                        <ul>
                                            <li>
                                                <div class="cart__title">
                                                    <h4>Your Cart</h4>
                                                    <span></span>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="cart__sub d-flex justify-content-between align-items-center">
                                                    <h6>Subtotal</h6>
                                                    <span class="cart__sub-total"><?php echo htmlspecialchars('$' . number_format($totalPrice, 2)); ?></span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="cart.php" class="wc-cart mb-10">View cart</a>
                                                <?php if ($totalPrice > 0 ): ?>

                                                    <a href="checkout.php" class="wc-checkout">Checkout</a>
                                                <?php else: ?>

                                                <?php endif; ?>
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




</header>
