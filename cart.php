<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cart</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="js/cart.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="css/cart1.css">
</head>

<body>
    <!--	Header	-->
    <div id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Phone Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                    </li>
                    </a>
                </ul>
                </div>
                <div id="cart" class="col-lg-3 col-md-3 col-sm-12">
                        <a class="mt-4 mr-2" href="cart.php">cart
                            <i class="fa-solid fa-cart-shopping cart-icon">
                            <span class="mt-3">8</span></i>
                        </a>
                    </div>
            </div>
        </nav>  
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <!--	End Header	-->

    <!--	Body	-->
    <div id="body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav>
                        <div id="menu" class="collapse navbar-collapse">
                            <?php include_once("menu.php"); ?>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div id="main" class="col-lg-12 col-md-12 col-sm-12">
                    <!--	Slider	-->
                    <div id="slide" class="carousel slide" data-ride="carousel">
            </div>
        </div>
    </div>
    <!--	End Body	-->
    <header id="site-header">
                    <div class="container">
                        <section id="cart"> 
                            <article class="product">
                                <header>
                                    <a class="remove">
                                        <img src="images/product/product-4.png " alt="">
                                        <h3>Remove product</h3>
                                    </a>
                                </header>
                                <div class="content">
                                    <h1>Iphone 15 ProMax 256gb</h1>

                                </div>
                                <footer class="content">
                                    <h2 class="full-price">
                                        40000000 VND
                                    </h2>
                                    <h2 class="price">
                                    <input type="number" id="quantity" class="form-control form-blue quantity" value="1" min="1" style="margin-top: 8px">
                                    </h2>
                                </footer>
                            </article>
                            <article class="product">
                                <header>
                                    <a class="remove">
                                        <img src="images/product/product-1.png" alt="">
                                        <h3>Remove product</h3>
                                    </a>
                                </header>
                                <div class="content">
                                    <h1>Iphone 13proMax</h1>
                                </div>
                                <footer class="content">
                                    <h2 class="full-price">
                                        24000000 VND
                                    </h2>
                                    <h2 class="price">
                                    <input type="number" id="quantity" class="form-control form-blue quantity" value="1" min="1" style="margin-top: 8px">
                                    </h2>
                                </footer>
                            </article>
                            <article class="product">
                                <header>
                                    <a class="remove">
                                        <img src="images/product/product-2.png" alt="">
                                        <h3>Remove product</h3>
                                    </a>
                                </header>
                                <div class="content">
                                    <h1>Iphone 12</h1>
                                </div>
                                <footer class="content">
                                    <h2 class="full-price">
                                        18000000VND
                                    </h2>
                                    <h2 class="price">
                                    <input type="number" id="quantity" class="form-control form-blue quantity" value="1" min="1" style="margin-top: 8px">
                                    </h2>
                                </footer>
                            </article>
                        </section>
                    </div>
                    <footer id="site-footer">
                        <div class="container clearfix">
                            <div class="left">
                                <h2 class="subtotal">Subtotal: <span>82000000</span>VND</h2>
                                <h3 class="tax">Taxes (5%): <span>4100000</span>VND</h3>
                                <h3 class="shipping">Shipping: <span>30000</span>VND</h3>
                            </div>
                            <div class="right">
                                <h1 class="total">Total: <span>86130000</span>VND</h1>
                                <a class="btn">Checkout</a>
                            </div>
                        </div>
                    </footer>
                    <div id="customer">
                        <form method="post">
                            <div class="row">       
                                <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="First and last name (required)" type="text" name="name"
                                        class="form-control" required>
                                </div>
                                <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Phone number (required)" type="text" name="phone"
                                        class="form-control" required>
                                </div>
                                <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Email (required)" type="text" name="mail" class="form-control"
                                        required>
                                </div>
                                <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                                    <input placeholder="Home or work address (required)" type="text"
                                        name="add" class="form-control" required>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                                <a href="#">
                                    <b>Buy now</b>
                                    <span>Super fast delivery</span>
                                </a>
                            </div>
                            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                                <a href="#">
                                    <b>Online Installment</b>
                                    <span>Please call (+84) 03.95.95.4444</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--	End Customer Info	-->
                </div>
            </div>
    <div id="footer-top">
        <div class="container">
        <div class="row">
        	<div id="logo-2" class="col-lg-3 col-md-6 col-sm-12">
            	<h2><a href="#"><img src="images/logo.jpg" style="width: 200px; height: 120px" he></a></h2>
                <p>
                	<strong>Phone Shop</strong> Coming to the mobile phone market, Phone Shop always competes with
                    its prestige with new products, attractive prices, and many incentives for its customers.
                </p>
            </div>
            <div id="address" class="col-lg-3 col-md-6 col-sm-12">
                <h3>Address</h3>
                <p>48 D. Tran Duy Hung, Trung Hoa, Cau Giay, Hanoi</p>
                <p>126 D. Ho Tung Mau, Mai Dich, Cau Giay, Hanoi</p>
            </div>
            <div id="service" class="col-lg-3 col-md-6 col-sm-12">
            	<h3>Service</h3>
            	<p>Warranty on breakage, Battery</p>
            	<p>Accessories Warranty</p>
            </div>
            <div id="hotline" class="col-lg-3 col-md-6 col-sm-12">
            	<h3>Hotline</h3>
            	<p>Phone Sale: (+84) 0548415616</p>
                <p>Email: nguyenvana@gmail.com</p>
            </div>
        </div>
        </div>
    </div>
    <!--	Footer	-->
    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>
                        2022 © Webleaners Training. All rights reserved. Developed by Webleaners Training.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--	End Footer	-->
</body>
</html>