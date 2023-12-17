<?php 
    include_once("../config/database.php");
    $sqlCategoryAll = "SELECT * FROM category ORDER BY cat_id ASC";
    $queryCategoryAll = mysqli_query($conn, $sqlCategoryAll);
    // lấy thông tin sản phẩm cũ
    if(isset($_GET['prd_id'])){
        $prd_id = $_GET['prd_id'];
        // Chuẩn bị câu lệnh truy vấn
        $sqlProductEdit = "SELECT * FROM product WHERE prd_id = $prd_id";
        $queryProductEdit = mysqli_query($conn, $sqlProductEdit);
        if(mysqli_num_rows($queryProductEdit) > 0){
            $product = mysqli_fetch_array($queryProductEdit);
        }else{
            header("Location: product.php");
        }
        if(isset($_POST['sbm'])){
            if(empty($_POST['prd_name'])){
                $errors['prd_name'] = "Product name cannot be blank.";
            }else{
                $prd_name = $_POST['prd_name'];
            }
            $prd_price = $_POST['prd_price'];
            $prd_warranty = $_POST['prd_warranty'];
            $prd_accessories = $_POST['prd_accessories'];
            $prd_promotion = $_POST['prd_promotion'];
            $prd_status = $_POST['prd_status'];
            if(isset($_POST['cat_featured'])){
                $prd_featured = $_POST['prd_featured'];
            }else{
                $prd_featured = 0;
            }
            $prd_details = $_POST['prd_details'];
            $prd_new = $_POST['prd_new'];
            if(!empty($_FILES['prd_image']['name'])){
                $prd_image = $_FILES['prd_image']['name'];
                $prd_tmp_name = $_FILES['prd_image']['tmp_name'];
                move_uploaded_file($prd_tmp_name, "images/".$prd_image);
            }else {
                $prd_image = $product['prd_image'];
            }
            
            $cat_id = $_POST ['cat_id'];
            $sqlUpdateProduct = "UPDATE product SET
                            prd_name = '$prd_name',
                            prd_price = $prd_price,
                            prd_warranty = '$prd_warranty',
                            prd_accessories = '$prd_accessories',
                            prd_promotion = '$prd_promotion',
                            cat_id = $cat_id,
                            prd_status = $prd_status,
                            prd_featured = $prd_featured,
                            prd_details = '$prd_details',
                            prd_image = '$prd_image',
                            prd_new = '$prd_new'
                            WHERE prd_id = $prd_id";

            mysqli_query($conn, $sqlUpdateProduct);
            header("Location: product.php");
        }
    }else{
        header ("Location: product.php");
    }
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Mobile Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script src="index.js"></script>
    <!-- ======= Styles ====== -->
<link rel="stylesheet" href="css/style.css">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
        <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><span>Mobile</span>Shop</a>
                        <ul class="user-menu">
                            <li class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
                                    <li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                                    
                </div>
            </nav> -->

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span>Phone Shop</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                    <!-- <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label> -->
                    <div class="user">
                        <img src="assets/imgs/customer01.jpg" alt="">
                        <style>
                        .user {
                            height: 20px;
                            width: 20px
                        }
                        </style>
                    </div>
                </div>
                    
                    </li>
                </ul>
            </div>

        </div>
    </nav>
		
	<!-- <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="thanhvien.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li class="active"><a href="product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li><a href="comment.php"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Quản lý bình luận</a></li>
            <li><a href="ads.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý quảng cáo</a></li>
            <li><a href="setting.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li>
		</ul>

	</div> -->

    <div class="navigation nav menu">
            <ul>
                <li>
                    <a href="/mobile_shop/admin/index.php">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Phone Shop</span>
                    </a>
                </li>

                <li>
                    <a href="/mobile_shop/admin/index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/mobile_shop/admin/user.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Manage Member</span>
                    </a>
                </li>

                <li>
                    <a href="/mobile_shop/admin/product.php">
                        <span class="icon">
                            <ion-icon name="phone-portrait-outline"></ion-icon>
                        </span>
                        <span class="title">Product Management</span>
                    </a>
                </li>

                <li>
                    <a href="/mobile_shop/admin/category.php">
                        <span class="icon">
                            <ion-icon name="duplicate-outline"></ion-icon>
                        </span>
                        <span class="title">Catalog anagement</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

	</div>
		
	<div class="col-lg-10 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Product Management</a></li>
				<li class="active">
                    <?php 
                    if(mysqli_num_rows($queryProductEdit) > 0) {
                        echo $product['prd_name'];
                    } else{ echo "Product information does not exist.";}
                ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Product:
                    <?php if(mysqli_num_rows($queryProductEdit) > 0) {
                    echo $product['prd_name'];
                } else {
                    echo "Product information does not exist.";
                } 
                ?></h1>
			</div>
        </div><!--/.row-->
        <?php if(mysqli_num_rows($queryProductEdit) > 0) { ?>
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form action="" role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Product's name</label>
                                    <input type="text" name="prd_name" required class="form-control" value="<?php echo $product['prd_name']; ?>"  placeholder="">
                                    <?php if (isset($errors['prd_name'])) {echo $errors['prd_name']; }?>
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Product price</label>
                                    <input type="number" name="prd_price" required value="<?php echo $product['prd_price']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Warranty</label>
                                    <input type="text" name="prd_warranty" required value="<?php echo $product['prd_warranty']; ?>" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Accessories</label>
                                    <input type="text" name="prd_accessories" required value="<?php echo $product['prd_accessories']; ?>" class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Promotion</label>
                                    <input type="text" name="prd_promotion" required value="<?php echo $product['prd_promotion']; ?>" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>New</label>
                                    <input type="text" name="prd_new" required value="<?php echo $product['prd_new']; ?>" type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image product</label>
                                    <input type="file" name="prd_image" require>
                                    <br>
                                    <div>
                                        <img src="images/<?php echo $product['prd_image']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="cat_id" class="form-control">
                                    <?php
                                            if (mysqli_num_rows($queryCategoryAll)) {
                                                while ($cate = mysqli_fetch_assoc($queryCategoryAll)) {
                                             
                                        ?>
                                        <option value=<?php echo $cate['cat_id'];?>><?php  echo $cate['cat_name']; ?></option>

                                        <?php 
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="prd_status" class="form-control">
                                        <option value=1 <?php if ($product['prd_status'] == 1) {echo "selected"; }?>>Stocking</option>
                                        <option value=0 <?php if ($product['prd_status'] == 0) {echo "selected"; }?>>Out of stock</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Featured products</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" <?php if ($product['prd_featured'] == 1) {echo "checkbox"; }?> type="checkbox" value=1>Highlights
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea name="prd_details" required class="form-control" rows="3" <?php echo $product['prd_details']; ?>></textarea>
                                    </div>
                                <input type="submit" name="sbm" class="btn btn-primary" value = "Update"></input>
                                <button type="reset" class="btn btn-default">Refresh</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div>
            <!-- /.row -->
            <?php 
                }
            ?>
		
	</div>	<!--/.main-->	

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>	
</body>

</html>
