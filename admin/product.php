<?php
    include_once("../config/database.php");
    // Lay danh sach san pham
    // chuan i cau truy van
    $limit = 5;
    $queryCount = mysqli_query($conn, "SELECT count(prd_id) as total FROM product");
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


    $sqlAllProducts = "SELECT p.prd_id, p.prd_name, p.prd_price, p.prd_image, p.prd_status, c.cat_name FROM product p
                        INNER JOIN category c
                        ON p.cat_id = c.cat_id
                        ORDER BY prd_id ASC LIMIT $start, $limit";
    // Thuc hien cau truy van
    $queryAllProducts = mysqli_query($conn, $sqlAllProducts);

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
    <style>
        
    </style>
    
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
        <!-- <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div> -->
    <!-- <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li><a href="index.php"><svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> Dashboard</a></li>
            <li><a href="user.php"><svg class="glyph stroked male user ">
                        <use xlink:href="#stroked-male-user" />
                    </svg>Quản lý thành viên</a></li>
            <li><a href="category.php"><svg class="glyph stroked open folder">
                        <use xlink:href="#stroked-open-folder" />
                    </svg>Quản lý danh mục</a></li>
            <li class="active"><a href="product.php"><svg class="glyph stroked bag">
                        <use xlink:href="#stroked-bag"></use>
                    </svg>Quản lý sản phẩm</a></li>
            <li><a href="comment.php"><svg class="glyph stroked two messages">
                        <use xlink:href="#stroked-two-messages" />
                    </svg> Quản lý bình luận</a></li>
            <li><a href="ads.php"><svg class="glyph stroked chain">
                        <use xlink:href="#stroked-chain" />
                    </svg> Quản lý quảng cáo</a></li>
            <li><a href="setting.php"><svg class="glyph stroked gear">
                        <use xlink:href="#stroked-gear" />
                    </svg> Cấu hình</a></li>
        </ul>

    </div> -->

    
    <div class="navigation nav menu">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Phone Shop</span>
                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="user.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Manage Member</span>
                    </a>
                </li>

                <li>
                    <a href="product.php">
                        <span class="icon">
                            <ion-icon name="phone-portrait-outline"></ion-icon>
                        </span>
                        <span class="title">Product Management</span>
                    </a>
                </li>

                <li>
                    <a href="category.php">
                        <span class="icon">
                            <ion-icon name="duplicate-outline"></ion-icon>
                        </span>
                        <span class="title">Catalog anagement</span>
                    </a>
                </li>

                <li>
                    <a href="login.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--/.sidebar-->

    <div class="col-lg-10 col-lg-offset-0,5 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">List of products</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List of products</h1>
            </div>
        </div>
        <!--/.row-->
        <div id="toolbar" class="btn-group">
            <a href="add_product.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Add product
            </a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" class="table" data-toggle="table">
                            <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">ID</th>
                                    <th data-field="name" data-sortable="true">Product's name</th>
                                    <th data-field="price" data-sortable="true">Price</th>
                                    <th>Image product</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(mysqli_num_rows($queryAllProducts) > 0){
                                        while ($product = mysqli_fetch_assoc($queryAllProducts)) {
                                        
                                ?>
                        
                                <tr>
                                    <td style=""><?php echo $product['prd_id']; ?></td>
                                    <td style=""><?php echo $product['prd_name']; ?></td>
                                    <td style=""><?php echo $product['prd_price']; ?></td>
                                    <td style="text-align: center" id="product-img"><img width="90" height="120"
                                            src="images/<?php echo $product['prd_image']; ?>" /></td>
                                    <td>
                                        <?php 
                                            if ($product['prd_status'] == 1) {
                                                echo '<span class="label label-success">Stocking</span></td>';
                                            } else {
                                                echo '<span class="label label-danger">Out of stock</span></td>';
                                            }
                                        ?>
                                        
                                    <td><?php echo $product['cat_name']; ?></td>
                                    <td class="form-group">
                                        <a href="edit_product.php?prd_id=<?php echo $product['prd_id']; ?>" class="btn btn-primary"><i
                                                class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="del_product.php?prd_id=<?php echo $product['prd_id']; ?>" class="btn btn-danger"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                                <?php 
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php 
                                    if ($current_page > 1 && $total_pages > 1) {
                                        $prev = $current_page - 1;
                                        echo '<li class="page-item"><a class="page-link" href="product.php?current_page='.$prev.'">&raquo;</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><a class="page-link disabled">&raquo;</a></li>';
                                    }
                                ?> 

                                <?php 
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $current_page) {
                                            echo '<li class="page-item active"><a class="page-link disabled" >'.$i.'</a></li>';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="product.php?current_page='.$i.'" >'.$i.'</a></li>';
                                        }
                                        
                                    } 
                                ?>

                                <?php 
                                    if ($current_page < $total_pages && $total_pages > 1) {
                                        $next = $current_page + 1;
                                        echo '<li class="page-item"><a class="page-link" href="product.php?current_page='.$next.'">&raquo;</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><a class="page-link disabled">&raquo;</a></li>';
                                    }
                                ?>

                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>