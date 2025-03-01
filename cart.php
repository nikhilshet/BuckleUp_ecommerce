<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buckle Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php 
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    ?>
    <div class="site-wrap">
        <div class="site-navbar py-2">
            <div class="search-wrap">
                <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="#" method="post">
                        <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="index.php" class="js-logo-clone"><img src="images/LOGO.png"></a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="shop.php">Store</a></li>
                                <li class="has-children">
                                    <a href="#">Categories</a>
                                    <ul class="dropdown">
                                        <li><a href="formal.php">Formals</a></li>
                                        <li class="has-children">
                                            <a href="#">Sneakers</a>
                                            <ul class="dropdown">
                                                <li><a href="jordans.php">Jordans</a></li>
                                                <li><a href="yeezy.php">Yeezy</a></li>
                                                <li><a href="converse.php">Converse</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="sports.php">Sports</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                      <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                      <a href="cart.php" class="icons-btn d-inline-block bag">
                          <span class="icon-shopping-bag"></span>
                          <span class="number">
                            <?php
                            $totalItems = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $item) {
                                    $totalItems += $item['Quantity'];
                                }
                            }
                            echo $totalItems;
                            ?>
        </span>
    </a>
    <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
            class="icon-menu"></span></a>
</div>
                </div>
            </div>
        </div>

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0">
                        <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Cart</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <form class="col-md-12" method="post">
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Sr.No</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            $total += $value['Price'] * $value['Quantity'];
                                            $sr = $key + 1;
                                            echo "
                                                <tr>
                                                    <td>$sr</td>
                                                    <td>$value[Item_Name]</td>
                                                    <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                                    <td>
                                                        <input class='text-center iquantity' onchange='subTotal()' type='number' value='$value[Quantity]' min='1' max='5' data-item-name='$value[Item_Name]'>
                                                    </td>
                                                    <td>
                                                        <input type='button' value='Delete' onclick='deleteRow(this)'>
                                                    </td>
                                                </tr>
                                            ";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            
                            <div class="col-md-6">
                                <button class="btn btn-outline-primary btn-md btn-block"><a href="shop.php">Continue Shopping</a></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-black h4" for="coupon">Coupon</label>
                                <p>Enter your coupon code if you have one.</p>
                            </div>
                            <div class="col-md-8 mb-3 mb-md-0">
                                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h6 id="gtotal"><?php echo $total; ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <form action="checkout.php">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed To Checkout</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-secondary bg-image" style="background-image: url('images/store.jpg');">
            <div class="container">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bannersmall2.png');">
                            <div class="banner-1-inner align-self-center">
                                <h2>Offline Store <br> Opening Soon</h2>
                                <p>In your Nearest Mall</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bannersmall1.png');">
                            <div class="banner-1-inner align-self-center">
                                <h2>Monthly Discounts <br> Up to 50% Off</h2>
                                <p>Hurry Up!</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="footer-heading">About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, nobis.</p>
                    </div>
                    <div class="col-md-4">
                        <h2 class="footer-heading">Connect With Us</h2>
                        <ul class="list-unstyled">
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h2 class="footer-heading">Newsletter</h2>
                        <form action="#" method="post">
                            <input type="email" class="form-control" placeholder="Email">
                            <input type="submit" class="btn btn-primary btn-md mt-2" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>

    <script>
        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
            subTotal();
        }

        function subTotal() {
            let total = 0;
            document.querySelectorAll('.site-blocks-table tbody tr').forEach(row => {
                const price = parseFloat(row.querySelector('.iprice').value);
                const quantity = parseInt(row.querySelector('.iquantity').value);
                total += price * quantity;
            });
            document.getElementById('gtotal').innerText = total;
        }
    </script>
</body>

</html>
