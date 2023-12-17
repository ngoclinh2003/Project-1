<?php 
    include_once("config/database.php");
    if(isset($_GET['prd_id'])) {
        $prd_id = $_GET['prd_id'];
        $sqlProductDetail = "SELECT * FROM product WHERE prd_id=$prd_id";
        $queryProductDetail = mysqli_query($conn, $sqlProductDetail);
        if (mysqli_num_rows($queryProductDetail) > 0) {
            $productDetail = mysqli_fetch_assoc($queryProductDetail);
        } else {
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Product</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/product.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>
<body>
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
                            $sqlFeatured = "SELECT * FROM"
                        ?>

                    <!--	List Product	-->
                    <div id="product">
                        <div id="product-head" class="row">
                            <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
                                <img src="images/product/<?php echo $productDetail['prd_image']; ?>">
                            </div>
                            <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
                                <h1><?php echo $productDetail['prd_name']; ?></h1>
                                <ul>
                                    <li><span>Insurance:</span> <?php echo $productDetail['prd_warranty']; ?></li>
                                    <li><span>Go with:</span> <?php echo $productDetail['prd_accessories']; ?></li>
                                    <li><span>Status:</span> <?php echo $productDetail['prd_new']; ?></li>
                                    <li><span>Promotion:</span> <?php echo $productDetail['prd_promotion']; ?></li>
                                    <li id="price">Selling Price (excluding VAT)</li>
                                    <li id="price-number"><?php echo number_format($productDetail['prd_price'],0,',','.'); ?></li>
                                    <li id="status">
                                        <?php 
                                            if ($productDetail['prd_status'] == 1) {
                                                echo "Stocking";
                                            } else {
                                                echo "Out of stock";
                                            }
                                        ?>
                                    </li>
                                </ul>
                                <div id="add-cart"><a href="#">Buy now</a></div>
                            </div>
                        </div>
                        <div id="product-body" class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h3>Product Description</h3>
                                <?php 
                                    echo $productDetail['prd_details'];
                                ?>
                            </div>
                        </div>

                        <!--	Comment	-->
                        <div id="comment" class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h3>Product Comments</h3>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input name="comm_name" required type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input name="comm_mail" required type="email" class="form-control" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label>Content:</label>
                                        <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" name="sbm" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!--	End Comment	-->

                        <!--	Comments List	-->
                        <div id="comments-list" class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="comment-item">
                                    <ul>
                                        <li><b>Nguyen Van A</b></li>
                                        <li>2018-01-03 20:40:10</li>
                                        <li>
                                            <p>Beautiful design, very sensitive touch, no need to hold in hand. Take a shot
                                            Relatively sharp image, very good game play. If the price is a bit soft, I will sell it
                                            quite run. A good product that everyone can consider.</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="comment-item">
                                    <ul>
                                        <li><b>Nguyen Van A</b></li>
                                        <li>2018-01-03 20:40:10</li>
                                        <li>
                                            <p>Beautiful design, very sensitive touch, no need to hold in hand. Take a shot
                                            Relatively sharp image, very good game play. If the price is a bit soft, I will sell it
                                            quite run. A good product that everyone can consider.</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="comment-item">
                                    <ul>
                                        <li><b>Nguyen Van A</b></li>
                                        <li>2018-01-03 20:40:10</li>
                                        <li>
                                            <p>Beautiful design, very sensitive touch, no need to hold in hand. Take a shot
                                            Relatively sharp image, very good game play. If the price is a bit soft, I will sell it
                                            quite run. A good product that everyone can consider.</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="comment-item">
                                    <ul>
                                        <li><b>Nguyen Van A</b></li>
                                        <li>2018-01-03 20:40:10</li>
                                        <li>
                                            <p>Beautiful design, very sensitive touch, no need to hold in hand. Take a shot
                                            Relatively sharp image, very good game play. If the price is a bit soft, I will sell it
                                            quite run. A good product that everyone can consider.</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="comment-item">
                                    <ul>
                                        <li><b>Nguyen Van A</b></li>
                                        <li>2018-01-03 20:40:10</li>
                                        <li>
                                            <p>Beautiful design, very sensitive touch, no need to hold in hand. Take a shot
                                            Relatively sharp image, very good game play. If the price is a bit soft, I will sell it
                                            quite run. A good product that everyone can consider.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--	End Comments List	-->
                    </div>
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