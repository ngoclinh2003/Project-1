<?php
    include_once("../config/database.php");
    $sqlCategoryAll= "SELECT * FROM category ORDER BY cat_id ASC";
    $queryCategoryAll = mysqli_query($conn, $sqlCategoryAll);
    if(isset($_POST['sbm'])){ 
        if(empty($_POST['prd_name'])) {
            $errors['prd_name'] = "Product name cannot be empty";
        }else{
            $prd_name = $_POST['prd_name'];
        }
        $prd_price = $_POST['prd_price'];
        $prd_warranty = $_POST['prd_warranty'];
        $prd_accessories = $_POST['prd_accessories'];
        $prd_promotion = $_POST['prd_promotion'];
        $cat_id = $_POST['cat_id'];
        $prd_status = $_POST['prd_status'];
        if(isset($_POST['prd_featured'])){
            $prd_featured = $_POST['prd_featured'];
        }else{
            $prd_featured = 0;
        }
        $prd_details = $_POST['prd_details'];
        $prd_image = $_FILES['prd_image']['name'];
        $prd_new = $_POST['prd_new'];
        $sqlInsertPrd = "INSERT INTO product(prd_name, prd_price, prd_warranty,prd_accessories, prd_promotion,cat_id,
                        prd_status, prd_featured, prd_details, prd_image, prd_new)
                        VALUE ('$prd_name', $prd_price, '$prd_warranty', '$prd_accessories', '$prd_promotion', '$cat_id',
                        '$prd_status', '$prd_featured', '$prd_details', '$prd_image', '$prd_new')";
        mysqli_query($conn, $sqlInsertPrd);
        $nguon = $_FILES['prd_image']['tmp_name'];
        $dich = "image/".$prd_image;
        move_uploaded_file($nguon, $dich);
        header("Location: product.php");
    }
    
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Mobile Shop - Administrator</title>

<link rel="stylesheet" href="\mobile_shop\admin\css\bootstrap.min.css">
<link rel="stylesheet" href="\mobile_shop\admin\css/datepicker3.css">
<link rel="stylesheet" href="\mobile_shop\admin\css/bootstrap-table.css">
<link rel="stylesheet" href="\mobile_shop\admin\css/styles.css">


<script src="js/lumino.glyphs.js"></script>
<script src="index.js"></script>
    <!-- ======= Styles ====== -->
<link rel="stylesheet" href="css/style.css">


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
            <li><a href="/mobile_shop/admin/admin.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ quản lí</a></li>
			<li><a href="/mobile_shop/admin/user.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="/mobile_shop/admin/category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li class="active"><a href="/mobile_shop/admin/product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			
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
				<li class="active">Add Product</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Product</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form action="" role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Product's name</label>
                                    <input required name="prd_name" class="form-control" placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Product price</label>
                                    <input required name="prd_price" type="number" min="0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Insurance</label>
                                    <input required name="prd_warranty" type="text" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Accessories</label>
                                    <input required name="prd_accessories" type="text" class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Promotion</label>
                                    <input required name="prd_promotion" type="text" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>New</label>
                                    <input required name="prd_new" type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image product</label>
                                    
                                    <input required name="prd_image" type="file" onchange="preview()">
                                    <br>
                                    <div>
                                        <img src="img/download.jpeg" id="prdImage" width="225px" height="325px">
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
                                        <option value=1 selected>Stocking</option>
                                        <option value=0>Out of stock</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Featured products</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1>Highlights
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea required name="prd_details" class="form-control" rows="3"></textarea>
                                    </div>
                                <input name="sbm" type="submit" value="Add new" class="btn btn-success"></input>
                                <button type="reset" class="btn btn-default">Refresh</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
    <script>
        function preview(){
            prdImage.src=URL.createObjectURL(event.target.file[0]);
        }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>	
</body>

</html>