<?php 
    include_once("config/database.php");
    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
        $queryCate = mysqli_query($conn, "SELECT cat_name FROM category WHERE cat_id = $cat_id");
        $resultCate = mysqli_fetch_assoc($queryCate);
        
        $limit = 9;
        $queryCount = mysqli_query($conn, "SELECT count(prd_id) as total FROM product WHERE cat_id = $cat_id");
        $result = mysqli_fetch_array($queryCount);
        $total_records = $result['total'];
        $total_pages = ceil($total_records/ $limit);

        if (isset($_GET['current_page'])) {
            $current_page = $_GET['current_page'];
        } else {
            $current_page = 1;
        }

        if ($current_page < 1) {
            $current_page = 1;
        }

        if ($current_page > $total_pages) {
            $current_page = $total_pages;
        }

        $start = ($current_page - 1) * $limit;


        $sqlAllProducts = "SELECT p.prd_id, p.prd_name, p.prd_price, p.prd_image, p.prd_status FROM product p
                            INNER JOIN category c
                            ON p.cat_id = c.cat_id
                            WHERE p.cat_id = $cat_id
                            ORDER BY prd_id ASC LIMIT $start, $limit";
        // Thuc hien cau truy van
        $queryAllProducts = mysqli_query($conn, $sqlAllProducts);
    } else {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Category</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/category.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
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
                        <a class="mt-4 mr-2" href="cart.php">giỏ hàng
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

                    <!--	List Product	-->
                    <div class="products">
                        <h3><?php echo $resultCate['cat_name']; ?> (hiện có <?php echo $total_records; ?> sản phẩm )</h3>
                        <div class="product-list row">
                        <?php 
                            if (mysqli_num_rows($queryAllProducts) > 0) {
                                while ($product = mysqli_fetch_assoc($queryAllProducts)) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                            <div class="product-item card text-center">
                                <a href="product-detail.php?prd_id=<?php echo $product['prd_id']; ?>">
                                <img src="images/product/<?php echo $product['prd_image']; ?>"></a>
                                <h4><a href="product-detail.php?prd_id=<?php echo $product['prd_id']; ?>"><?php echo $product['prd_name']; ?></a></h4>
                                <p>Price: <span><?php echo number_format($product['prd_price'], 0, '.', ','); ?>đ</span></p>
                            </div>
                        </div>
                        <?php 
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <!--	End List Product	-->

                    <div id="pagination">
                        <ul class="pagination">
                                <?php 
                                    if ($current_page > 1 && $total_pages > 1) {
                                        $prev = $current_page - 1;
                                        echo '<li class="page-item"><a class="page-link" href="category-product.php?cat_id='.$cat_id.' & current_page='.$prev.'">&raquo;</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><a class="page-link disabled">&raquo;</a></li>';
                                    }
                                ?>
                                <?php 
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $current_page) {
                                            echo '<li class="page-item active"><a class="page-link disabled" >'.$i.'</a></li>';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="category-product.php?cat_id='.$cat_id.' & current_page='.$i.'" >'.$i.'</a></li>';
                                        }
                                        
                                    } 
                                ?>
                                <?php 
                                    if ($current_page < $total_pages && $total_pages > 1) {
                                        $next = $current_page + 1;
                                        echo '<li class="page-item"><a class="page-link" href="category-product.php?cat_id='.$cat_id.' & current_page='.$next.'">&raquo;</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><a class="page-link disabled">&raquo;</a></li>';
                                    }
                                ?>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
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