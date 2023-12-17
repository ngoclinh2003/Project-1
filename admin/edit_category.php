<?php
   include_once("../config/database.php");
   if (isset($_GET['cat_id'])) {
	$cat_id = $_GET['cat_id'];
	$sqlCate = "SELECT * FROM category WHERE cat_id = $cat_id";
	$queryCate = mysqli_query($conn, $sqlCate);
	if (mysqli_num_rows($queryCate) > 0) {
		$category = mysqli_fetch_assoc($queryCate);
	}else {
		header("Location: category.php");
	}
	if (isset($_POST['sbm'])) {// khi bấm submit thêm mới
		if (empty($_POST['cate_name'])) {
		$errors['cate_name'] = '<span style="color:red; font-size:13px" >Category names cannot be left blank</span>';
	   }else {
			   $cate_name = $_POST['cate_name'];
			   $sqlCheck = "SELECT * FROM category WHERE cat_name = '$cate_name' ";
			   $queryCheck = mysqli_query($conn, $sqlCheck);
			   if (mysqli_num_rows($queryCheck)> 0) {
				$errors['dupplicate'] = '<div class="alert alert-danger">Directory already exists !</div>';
			   }else {
				$sqlUpdateCate = "UPDATE category SET cat_name='$cate_name' WHERE cat_id = $cat_id";
				mysqli_query($conn, $sqlUpdateCate);
				header("Location:category.php");
			   }
	   }  
	   }
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
		        
                <li class="active"><a href="admin.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
                <li><a href="user.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
                <li><a href="category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
                <li><a href="product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
               
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
				<li><a href="">Manage categories</a></li>
				<li class="active">Category</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Category</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
						<?php 
								if(isset($errors['dupplicate']))  echo $errors['dupplicate'];
								
								?>
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label>Name list:</label>
                                <input type="text" name="cate_name"  value="<?php echo $category['cat_name']?>" class="form-control" placeholder="Tên danh mục...">
                                <?php 
								if(isset($errors['cate_name'])) { echo $errors['cate_name'];}
								?> 
							</div>
                            <input type="submit" name="sbm" value="Update" class="btn btn-primary"></input>
                            <button type="reset" class="btn btn-default">Refresh</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>