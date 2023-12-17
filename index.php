<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>
<body>

<!--	Header	-->
<style>
    body{
        background-color: yellow;
    }
</style>
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
            	<a class="mt-4 mr-2" href="cart.php">Cart
                    <i class="fa-solid fa-cart-shopping cart-icon">
                    <span class="mt-3">3</span></i>
                </a>
            </div>
    </div>
    </nav>           
    </div>

<!--	Body	-->
<div id="body">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<?php include_once("menu.php"); ?>
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-12 col-md-12 col-sm-12">
            	<!--	Slider	-->
                <div id="slide" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ul class="carousel-indicators">
                    <li data-target="#slide" data-slide-to="0" class="active"></li>
                    <li data-target="#slide" data-slide-to="1"></li>
                    <li data-target="#slide" data-slide-to="2"></li>
                    <li data-target="#slide" data-slide-to="3"></li>
                    <li data-target="#slide" data-slide-to="4"></li>
                  </ul> 
                  <!-- The slideshow -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="images/slide/slide-10.png" alt="Webleaners Training" height="450px" width="1180px">
                    </div>
                    <div class="carousel-item">
                      <img src="images/slide/slide-11.jpg" alt="Webleaners Training" height="450px" width="1180px">
                    </div>
                     <div class="carousel-item">
                      <img src="images/slide/slide-12.jpg" alt="Webleaners Training" height="450px" width="1180px">
                    </div>
                     <div class="carousel-item">
                      <img src="images/slide/slide-13.png" alt="Webleaners Training" height="450px" width="1180px">
                    </div>
                     <div class="carousel-item">
                      <img src="images/slide/slide-14.png" alt="Webleaners Training" height="450px" width="1180px">
                    </div>
					<div class="carousel-item">
                      <img src="images/slide/slide-15.jpg" alt="Webleaners Training" height="450px" width="1180px">
                    </div>
                  </div>
                  <!-- Left and right controls -->
                  <a class="carousel-control-prev" href="#slide" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#slide" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>
                
                </div>

                <!--	End Slider	-->
                <?php 
                    $sqlFeatured = "SELECT * FROM product WHERE prd_featured = 1 ORDER BY prd_id DESC LIMIT 6";
                    $queryFeatured = mysqli_query($conn, $sqlFeatured);
                ?>
                <!--	Feature Product	-->
                <div class="products">
                    <h3 style ="color: #000099;">Featured products</h3>
                    <div class="product-list row">
                    <?php 
                            if (mysqli_num_rows($queryFeatured) > 0) {
                                while ($productFeatured = mysqli_fetch_assoc($queryFeatured)) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                            <div class="product-item card text-center">
                                <a href="product-detail.php?prd_id=<?php echo $productFeatured['prd_id']; ?>"><img src="images/product/<?php echo $productFeatured['prd_image']; ?>"></a>
                                <h4><a href="product-detail.php?prd_id=<?php echo $productFeatured['prd_id']; ?>"><?php echo $productFeatured['prd_name']; ?></a></h4>
                                <p>Giá Bán: <span><?php echo number_format($productFeatured['prd_price'], 0, '.', ','); ?>đ</span></p>
                            </div>
                        </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
                <!--	End Feature Product	-->

                <!--	Latest Product	-->
                <div id="sidebar" class="col-lg-12 col-md-12 col-sm-12">
            	<div id="banner">
                	<div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner/banner-7.png"></a>
                    </div>
                </div>
            </div>

            <?php 
                    $sqlNew = "SELECT * FROM product ORDER BY prd_id DESC LIMIT 6";
                    $queryNew = mysqli_query($conn, $sqlNew);
                ?>

                <div class="products">
                    <h3 style ="color: #000099;">New product</h3>
                    <div class="product-list row">
                    <?php 
                            if (mysqli_num_rows($queryNew) > 0) {
                                while ($productNew = mysqli_fetch_assoc($queryNew)) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                            <div class="product-item card text-center">
                                <a href="product-detail.php?prd_id=<?php echo $productNew['prd_id']; ?>"><img src="images/product/<?php echo $productNew['prd_image']; ?>"></a>
                                <h4><a href="product-detail.php?prd_id=<?php echo $productNew['prd_id']; ?>"><?php echo $productNew['prd_name']; ?></a></h4>
                                <p>Price: <span><?php echo number_format($productNew['prd_price'], 0, '.', ','); ?>đ</span></p>
                            </div>
                        </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
                <!--	End Latest Product	-->
                
            </div>
            
            <div id="sidebar" class="col-lg-12 col-md-12 col-sm-12">
            	<div id="banner">
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner/banner-8.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner/banner-9.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--	End Body	-->

<div id="footer-top">
	<div class="container">
    	<div class="row">
        	<div id="logo-2" class="col-lg-3 col-md-6 col-sm-12">
            	<h2><a href="#"><img src="images/logo.jpg" style="width: 200px; height: 120px" he></a></h2>
                <p>
                	<strong>Phone Shop</strong> Coming to the mobile phone market, Phone Shop always competes with its prestige with new products, attractive prices, and many incentives for its customers. 
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
