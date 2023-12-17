<?php 
	 include_once("../config/database.php");

	 if(isset($_POST['sbm'])){
        if($_POST['user_pass'] == $_POST['user_re_pass']){
            $user_name = $_POST['user_name'];
            $sqlCheck1 = "SELECT * FROM users WHERE user_name = '$user_name'";
            $queryCheck1 = mysqli_query($conn, $sqlCheck1);
            $user_email = $_POST['user_email'];
            $sqlCheck2 = "SELECT * FROM users WHERE user_email = '$user_email'";
            $queryCheck2 = mysqli_query($conn, $sqlCheck2);
            $user_level = $_POST['user_level'];
            $user_pass = $_POST['user_pass'];
            if(mysqli_num_rows($queryCheck1)> 0 && mysqli_num_rows($queryCheck2)> 0){
                $errors['user'] = '<div class="alert alert-danger">User already exists !</div>';
            }else{
                    $sqlInsertUser = "INSERT INTO users(user_name, user_email, user_pass, user_level)
                                        VALUES ('$user_name', '$user_email', '$user_pass', $user_level)";
                    mysqli_query($conn, $sqlInsertUser);
                    header("Location: user.php");
            }
        }else{
            $errors['dupplicate'] = '<div class="alert alert-danger">Password field and re-enter password do not match !</div>';
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

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="user.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li><a href="product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Manage member</a></li>
				<li class="active">Add members</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add members</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                            	<!-- <div class="alert alert-danger"></div> -->
                                <form role="form" method="post">
                                <div class="form-group">
                                    <label>First and last name</label>
                                    <input type="text" name="user_name" required class="form-control" value="" placeholder="">
                                    <?php if(isset($errors['user'])){
                                        echo $errors['user'];
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="user_email" required value="" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="user_pass" required value="" class="form-control">
                                    <?php if(isset($errors['dupplicate'])){
                                        echo $errors['dupplicate'];
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label>Enter the password</label>
                                    <input type="password" name="user_re_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Permission</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2>Member</option>
                                    </select>
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
</body>

</html>
